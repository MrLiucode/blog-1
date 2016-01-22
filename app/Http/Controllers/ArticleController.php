<?php

namespace App\Http\Controllers;

use App\Contracts\IArticle;
use App\Contracts\ICategory;
use App\Contracts\ITag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param IArticle $articleService
     * @param ICategory $categoryService
     * @param ITag $tagService
     * @return \Illuminate\Http\Response
     */
    public function index(IArticle $articleService, ICategory $categoryService, ITag $tagService)
    {
        $articleList = $articleService->getList(10, ['tags', 'categories']);
        $category = $categoryService->lists(99);
        $hotArticle = [];
        $hotTagList = $tagService->getList(999);
        $goodArticle = [];
        return fontView('index', compact('articleList', 'category', 'hotArticle', 'hotTagList', 'goodArticle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return fontView('article.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
