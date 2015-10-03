<?php namespace App\Services;

use App\Models\Article as ArticleModel;
use App\Models\Category;
use App\Models\Tag;

class Article implements \App\Contracts\Article{

    public function findAllPaginated(ArticleModel $article, $pageSize = 10)
    {
        return $article->orderBy('created_at', 'DESC')->paginate($pageSize);
    }

    public function findRecommend(ArticleModel $article, $pageSize = 5)
    {
        return $article->orderBy('is_top', 'DESC')->paginate($pageSize);
    }

    public function findHot(ArticleModel $article, $pageSize = 10)
    {
        return $article->orderBy('click_num', 'DESC')->paginate($pageSize);
    }

    public function findById(ArticleModel $article, $articleId)
    {
        return $article->findOrFail($articleId);
    }

    public function findByCategory(Category $category, $categoryId, $pageSize = 10)
    {
        $categoryRes = $category->findOrFail($categoryId);
        $articleRes = $categoryRes->article()->orderBy('created_at', 'DESC')->paginate($pageSize);
        return ['category' => $categoryRes, 'article' => $articleRes];
    }

    public function findByTag(Tag $tag, $tagId, $pageSize = 10)
    {
        $tagRes = $tag->findOrFail($tagId);
        $articleRes = $tagRes->article()->orderBy('created_at', 'DESC')->paginate($pageSize);
        return ['tag' => $tagRes, 'article' => $articleRes];
    }


}