<?php namespace App\Repositories;

use App\Models\Category as CategoryModel;

class CategoryRepo
{

    protected $categoryModel;

    public function __construct(CategoryModel $model)
    {
        $this->categoryModel = $model;
    }

    public function getList()
    {
        return $this->categoryModel->all();
    }
}