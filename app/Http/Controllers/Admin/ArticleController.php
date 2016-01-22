<?php
/**
 * ArticleController.php
 *
 * Part of newblog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */

namespace App\Http\Controllers\Admin;

use App\Contracts\IArticle;
use App\Contracts\ICategory;
use App\Contracts\ITag;
use App\Http\Requests\ArticleRequest;
use App\Models\Article as ArticleModel;

class ArticleController extends BaseController
{

    const VIEW_INDEX = 'article.index';
    const VIEW_EDIT = 'article.edit';
    const ROUTE_INDEX = 'admin.article.index';

    public function index(IArticle $articleService)
    {
        $articleList = $articleService->getList(20, ['tags', 'categories']);
        return adminView(self::VIEW_INDEX, compact('articleList'));
    }

    public function create(ICategory $category, ITag $tag)
    {
        $categoryList = array_key_value($category->lists()->toArray()['data'], 'id', 'name'); //获取所有的分类
        $tagList = array_key_value($tag->getList(9999)->toArray()['data'], 'id', 'name'); //获取所有的标签
        return adminView('article.edit', compact('categoryList', 'tagList'));
    }

    public function store(ArticleRequest $request, IArticle $articleService)
    {
        $result = $articleService->store($request);
        return $result ? success(route(self::ROUTE_INDEX)) : error($articleService->getError() ?: '创建文章失败!');
    }

    public function edit(ArticleModel $article)
    {
        return adminView(self::VIEW_EDIT, compact('article'));
    }


    public function update(ArticleModel $article, ArticleRequest $request, IArticle $articleService)
    {
        $result = $articleService->update($article, $request);
        return $result ? success(route(self::ROUTE_INDEX), '修改文章成功!') : error($articleService->getError() ?: '修改文章失败!');
    }

    public function destroy(ArticleModel $article, IArticle $articleService)
    {
        $result = $articleService->destroy($article);
        return $result ? success(route(self::ROUTE_INDEX), '删除文章成功!') : error($articleService->getError() ?: '删除文章失败!');
    }

}
