<?php namespace App\Services;

use App\Http\Requests\ArticleRequest;
use App\Repositories\ArticleRepo as ArticleRepo;
use DB;

class Article implements \App\Contracts\IArticle
{

    public function store(ArticleRequest $request)
    {
        DB::beginTransaction();
        $tags = explode(',', $request->tags);   //获取所有的文章标签

        $category = $request->category; //获取文章分类

        $article = app(ArticleRepo::class)->storeArticle($request->all());

        $articleData = array_only($request->all(), ['title', 'content', 'status', 'published_at']);

    }

}