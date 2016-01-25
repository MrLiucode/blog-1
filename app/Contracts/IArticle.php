<?php namespace App\Contracts;

use App\Http\Requests\ArticleRequest;
use App\Models\Article as ArticleModel;

interface IArticle
{

    /**
     * 获取已发布的文章列表
     * @param int $pageSize
     * @param array $withParams
     * @return ArticleModel
     */
    public function getList($pageSize = 10, array $withParams = []);

    /**
     * 根据文章ID获取文章
     * @param $articleId
     * @return mixed
     */
    public function getArticle($articleId);

    /**
     * 获取点击量最大的文章列表
     * @param int $pageSize
     * @param array $withParams
     * @return ArticleModel
     */
    public function hotList($pageSize = 10, array $withParams = []);

    /**
     * 保存文章
     * @param ArticleRequest $request
     * @return ArticleModel|null
     */
    public function store(ArticleRequest $request);

    /**
     * 修改文章
     * @param ArticleModel $article
     * @param ArticleRequest $request
     * @return int|null
     */
    public function update(ArticleModel $article, ArticleRequest $request);

    /**
     * 删除文章
     * @param ArticleModel $article
     * @return int
     */
    public function destroy(ArticleModel $article);

    /**
     * 获取错误消息
     * @return string|null
     */
    public function getError();

}