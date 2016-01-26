<?php
/**
 * Category.php
 *
 * Part of newblog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */

namespace App\Services;

use App\Contracts\ICategory;
use App\Models\Article as ArticleModel;
use App\Models\Category as CategoryModel;
use Illuminate\Pagination\Paginator;

class Category implements ICategory
{

    /**
     * @var CategoryModel
     */
    protected $model;

    public function __construct(CategoryModel $model)
    {
        $this->model = $model;
    }

    /**
     * 获取所有分类列表
     * @param int $perPage
     * @param string|array $selectParams
     * @param string|array $withParams
     * @param array $columns
     * @return mixed
     */
    public function lists($perPage = 15, $selectParams = '*', $withParams = [], $columns = ['*'])
    {
        return $this->model->select($selectParams)->with($withParams)->orderBy('order', 'DESC')->paginate($perPage, $columns, 'categoryPage');
    }

    /**
     * 根据ID获取分类数据
     * @param $categoryId
     * @return CategoryModel|null
     */
    public function getCategory($categoryId)
    {
        return $this->model->findOrFail($categoryId);
    }

    /**
     * @param CategoryModel $model
     * @param int $perPage
     * @param array $columns
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getCategoryArticle(CategoryModel $model, $perPage = 15, $columns = ['*'])
    {
        return $model->article()->paginate($perPage, $columns, 'categoryArticlePage');
    }


    /**
     * 根据ID更新文章分类
     * @param $categoryId
     * @param array $data
     * @return CategoryModel|null
     */
    public function updateCategory($categoryId, array $data)
    {
        $category = $this->model->find($categoryId);
        return $category ? $category->update($data) : $category;
    }

    /**
     * 保存文章分类
     * @param array $data
     * @return CategoryModel
     */
    public function storeCategory(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * 根据ID删除文章分类
     * @param $categoryId
     * @return int
     */
    public function delCategory($categoryId)
    {
        return $this->model->destroy($categoryId);
    }

}

