<?php namespace App\Contracts;

use App\Http\Requests\ArticleRequest;

interface IArticle
{
    public function store(ArticleRequest $request);
}