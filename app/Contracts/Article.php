<?php namespace App\Contracts;

use App\Models\Article as ArticleModel;
use App\Models\Category;
use App\Models\Tag;

interface Article{

    public function all($pageSize = 10);

    public function findRecommend(ArticleModel $article, $pageSize = 5);

    public function findHot(ArticleModel $article, $pageSize = 10);

    public function findById(ArticleModel $article, $slug);

    public function findByCategory(Category $category, $categoryId, $pageSize = 10);

    public function findByTag(Tag $tag, $tagId, $pageSize = 10);

}
