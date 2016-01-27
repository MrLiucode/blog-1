<?php namespace App\Services;

use App\Contracts\IPaginateCache;
use App\Http\Requests\ArticleRequest;
use App\Models\Category as CategoryModel;
use App\Models\Tag as TagModel;
use App\Repositories\ArticleRepo as ArticleRepo;
use DB;
use App\Models\Article as ArticleModel;

class Article implements \App\Contracts\IArticle
{

    const ERROR_TAG_EMPTY = '标签内容不能为空!';
    const ERROR_CATEGORY_EMPTY = '分类内容不能为空!';

    /**
     * @var string $errorMsg 错误消息
     */
    protected $errorMsg;

    /**
     * @var IPaginateCache
     */
    protected $cache;

    /**
     * @var ArticleModel
     */
    protected $articleModel;

    public function __construct(ArticleModel $model)
    {
        $this->articleModel = $model;
    }

    /**
     * 获取文章列表
     * @param int $pageSize
     * @param  array $withParams
     * @param array $columns
     * @return ArticleModel
     */
    public function getList($pageSize = 10, array $withParams = [], $columns = ['*'])
    {
        return app(IPaginateCache::class)->get('article.list.paginate', function () use ($pageSize, $withParams, $columns) {
            return ArticleModel::published()
                ->with($withParams)
                ->orderByPublished()
                ->paginate($pageSize, $columns, 'articlePage');
        });
    }

    /**
     * 根据文章ID获取文章
     * @param $articleId
     * @return mixed
     */
    public function getArticle($articleId)
    {
        return app(IPaginateCache::class)->get("interface.article.item.{$articleId}", function () use ($articleId) {
            return ArticleModel::with(['user'])->findOrFail($articleId);
        });
    }


    /**
     * 获取点击量最大的文章列表
     * @param int $pageSize
     * @param array $withParams
     * @param array $columns
     * @return ArticleModel
     */
    public function hotList($pageSize = 10, array $withParams = [], $columns = ['*'])
    {
        return app(IPaginateCache::class)->get('article.hot.list.paginate', function () use ($pageSize, $withParams, $columns) {
            return ArticleModel::select(['id', 'title'])
                ->published()
                ->with($withParams)
                ->orderByHits()
                ->paginate($pageSize, $columns, 'hotArticleList');

        });
    }


    /**
     * 验证表单规则   TODO:这块需要加到表单验证部分，而不是加到当前接口中
     * @param ArticleRequest $request
     * @return bool
     */
    protected function validateRequest(ArticleRequest $request)
    {
        if (empty($request->tags)) {
            $this->errorMsg = self::ERROR_TAG_EMPTY;
            return false;
        }

        if (empty($request->category)) {
            $this->errorMsg = self::ERROR_CATEGORY_EMPTY;
            return false;
        }
        return true;
    }

    /**
     * 保存文章
     * @param ArticleRequest $request
     * @return ArticleModel|null
     */
    public function store(ArticleRequest $request)
    {
        if (!$this->validateRequest($request)) {
            return false;
        }
        $tags = $request->tags;
        $category = $request->category;
        DB::beginTransaction(); //开启事务
        $article = app(ArticleRepo::class)->storeArticle($request->all());  //创建文章
        //生成文章分类map和标签map
        if ($this->attachArticleCategory($article, $category) && $this->attachArticleTags($article, $tags)) {
            DB::commit();
            return true;
        }
        DB::rollBack();
        return false;
    }

    /**
     * 修改文章
     * @param ArticleModel $article
     * @param ArticleRequest $request
     * @return int|null
     */
    public function update(ArticleModel $article, ArticleRequest $request)
    {
        if (!$this->validateRequest($request)) {
            return false;
        }
        DB::beginTransaction(); //开启事务
        if ($article->update($request->all()) &&
            $this->attachArticleCategory($article, $request->category) &&
            $this->attachArticleTags($article, $request->tags)
        ) {
            DB::commit();
            return true;
        }
        return false;
    }

    /**
     * 生成文章标签map
     * @param ArticleModel $article
     * @param array $tagIds
     * @return bool
     */
    protected function attachArticleTags(ArticleModel $article, array $tagIds)
    {
        $tagResult = false;
        $article->tags()->detach(); //先删除原有的
        //从数据库中匹配出存在的tag Id
        if ($tagIds = matchModelData(TagModel::class, 'id', $tagIds)) {
            $article->tags()->attach($tagIds); //生成文章与标签的关联map
            $tagResult = true;
        }
        return $tagResult;  //返回生成结果
    }

    /**
     * 生成文章分类map
     * @param ArticleModel $article
     * @param array $categoryIds
     * @return bool|void
     */
    protected function attachArticleCategory(ArticleModel $article, array $categoryIds)
    {
        $result = false;
        $article->categories()->detach();   //删除原有文章分类map
        //从数据库中匹配出存在的分类 Id
        if ($categoryIds = matchModelData(CategoryModel::class, 'id', $categoryIds)) {
            $article->categories()->attach((array)$categoryIds); //生成文章与分类的关联map
            $result = true;
        }
        return $result;
    }

    /**
     * 删除文章
     * @param ArticleModel $article
     * @return int
     */
    public function destroy(ArticleModel $article)
    {
        DB::beginTransaction();
        $article->categories()->detach();   //删除原有文章分类map
        $article->tags()->detach();   //删除原有文章分类map
        $result = $article->delete();
        $result ? DB::commit() : DB::rollBack();
        return $result;
    }


    public function getError()
    {
        return $this->errorMsg;
    }

}