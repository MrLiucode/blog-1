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
use App\Models\Category as CategoryModel;

class Category implements ICategory{

    /**
     * 获取所有分类列表
     * @param int $perPage
     * @return mixed
     */
    public function lists($perPage = 15)
    {
        return CategoryModel::orderBy('order', 'DESC')->paginate($perPage);
    }

    /**
     * 根据ID获取分类数据
     * @param $categoryId
     * @return CategoryModel|null
     */
    public function getCategory($categoryId)
    {
        return CategoryModel::find($categoryId);
    }

    /**
     * 根据ID更新文章分类
     * @param $categoryId
     * @param array $data
     * @return CategoryModel|null
     */
    public function updateCategory($categoryId, array $data)
    {
        $category = CategoryModel::find($categoryId);
        return $category ? $category->update($data) : $category;
    }

    /**
     * 保存文章分类
     * @param array $data
     * @return CategoryModel
     */
    public function storeCategory(array $data)
    {
        return CategoryModel::create($data);
    }

    /**
     * 根据ID删除文章分类
     * @param $categoryId
     * @return int
     */
    public function delCategory($categoryId)
    {
        return CategoryModel::destroy($categoryId);
    }

}

