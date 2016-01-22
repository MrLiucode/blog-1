<?php namespace App\Contracts;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\User;

interface IArticleCategory
{

    /**
     * 获取文章分类分类
     * @param int $pageSize
     * @return Category
     */
    public function getList($pageSize = 10);

    /**
     * 根据ID获取文章文类
     * @param int $categoryId
     * @return Category
     */
    public function findById($categoryId);

    /**
     * 保存文章分类
     * @param CategoryRequest $request
     * @return mixed
     */
    public function storeCategory(CategoryRequest $request);

    /**
     * 更新文章分类
     * @param Category $category
     * @param CategoryRequest $request
     * @return mixed
     */
    public function updateCategory(Category $category, CategoryRequest $request);

    /**
     * 删除文章分类
     * @param Category $categoryModel
     * @return mixed
     */
    public function deleteCategory(Category $categoryModel);

}