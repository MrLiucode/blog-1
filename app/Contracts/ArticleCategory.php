<?php namespace App\Contracts;

use App\Models\Category;
use App\Models\User;

interface ArticleCategory{

    /**
     * 获取所有的的分类
     * @param int $pageSize
     * @return Category
     */
    public function all($pageSize = 10);

    /**
     * 根据ID获取文章文类
     * @param int $categoryId
     * @return Category
     */
    public function findById($categoryId);

}