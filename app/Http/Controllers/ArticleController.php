<?php

namespace App\Http\Controllers;

use App\Contracts\IArticle;
use App\Contracts\ICategory;
use App\Models\Article as ArticleModel;

use App\Http\Requests;
use App\Models\Category as CategoryModel;

class ArticleController extends BaseController
{

    const VIEW_LIST = 'articleList';

    /**
     * Display a listing of the resource.
     *
     * @param IArticle $articleService
     * @return \Illuminate\Http\Response
     */
    public function index(IArticle $articleService)
    {
        $articleList = $articleService->getList(10, ['tags', 'categories']);
        return fontView(self::VIEW_LIST, compact('articleList'));
    }

    public function categoryArticle(CategoryModel $categoryModel)
    {
        dump(app(ArticleModel::class)->categories()->relations());
        $articleList = [];
        return fontView(self::VIEW_LIST, compact('articleList'));
        return ;
        $articleList = $categoryModel->article;
        dd(app(ICategory::class)->getCategoryArticle($categoryModel->id));
        dd($articleList);
    }

    /**
     * Display the specified resource.
     *
     * @param  ArticleModel $article
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleModel $article)
    {
        return fontView('article', compact('article'));
    }

}
