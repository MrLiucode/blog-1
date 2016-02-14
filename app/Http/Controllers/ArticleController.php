<?php

namespace App\Http\Controllers;

use App\Contracts\IArticle;
use App\Contracts\ICategory;
use App\Contracts\ITag;
use App\Contracts\IUser;
use App\Models\Article as ArticleModel;

use App\Http\Requests;
use App\Models\Category as CategoryModel;
use App\Models\Tag as TagModel;
use App\Models\User as UserModel;

class ArticleController extends Controller
{

    const VIEW_LIST = 'articleList';

    protected $articleList;

    /**
     * 展示文章首页
     *
     * @param IArticle $articleService
     * @return \Illuminate\Http\Response
     */
    public function index(IArticle $articleService)
    {
        $this->articleList = $articleService->getList(15, ['tags', 'categories']);
        return $this->displayArticleList();
    }

    /**
     * 根据分类展示文章
     * @param CategoryModel $categoryModel
     * @param ICategory $categoryService
     * @return mixed
     */
    public function categoryArticle(CategoryModel $categoryModel, ICategory $categoryService)
    {
        $this->articleList = $categoryService->getCategoryArticle($categoryModel);
        return $this->displayArticleList();
    }

    /**
     * 根据标签展示文章
     * @param TagModel $tagModel
     * @param ITag $tagService
     * @return mixed
     */
    public function tagArticle(TagModel $tagModel, ITag $tagService)
    {
        $this->articleList = $tagService->getTagArticle($tagModel);
        return $this->displayArticleList();
    }

    /**
     * 根据用户展示文章
     * @param UserModel $userModel
     * @param IUser $userService
     * @return \Illuminate\Http\Response
     */
    public function userArticle(UserModel $userModel, IUser $userService)
    {
        $this->articleList = $userService->getUserArticle($userModel);
        return $this->displayArticleList();
    }

    /**
     * Display the specified resource.
     *
     * @param  ArticleModel $article
     * @param IArticle $articleServer
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleModel $article, IArticle $articleServer)
    {
        $articleServer->readAccumulation($article->id);
        return fontView('article', compact('article'));
    }

    /**
     * 渲染文章列表
     * @return \Illuminate\Http\Response
     */
    protected function displayArticleList()
    {
        return fontView(self::VIEW_LIST, ['articleList' => $this->articleList]);
    }

}
