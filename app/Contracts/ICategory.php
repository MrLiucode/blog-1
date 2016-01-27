<?php
/**
 * ICategory.php
 *
 * Part of newblog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */

namespace App\Contracts;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

interface ICategory
{

    /**
     * 获取所有分类列表
     * @param int $pageSize
     * @param string|array $selectParams
     * @param string|array $withParams
     * @param array $columns
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function lists($pageSize = 15, $selectParams = '*', $withParams = [], $columns = ['*']);

    /**
     * 根据ID获取分类数据
     * @param $categoryId
     * @return Category|null
     */
    public function getCategory($categoryId);

    /**
     * 根据分类获取文章
     * @param Category $model
     * @param int $perPage
     * @param array $columns
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getCategoryArticle(Category $model, $perPage = 15, $columns = ['*']);

    /**
     * 更新文章
     * @param Category $model
     * @param CategoryRequest $request
     * @return mixed
     */
    public function updateCategory(Category $model, CategoryRequest $request);

    /**
     * 保存文章分类
     * @param array $data
     * @return Category
     */
    public function storeCategory(array $data);

    /**
     * 根据ID删除文章分类
     * @param Category $model
     * @return int
     */
    public function delCategory(Category $model);

}

