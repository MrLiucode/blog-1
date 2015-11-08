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

use App\Models\Category;

interface ICategory{

    /**
     * 获取所有分类列表
     * @param int $pageSize
     * @param string|array $selectParams
     * @param string|array $withParams
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function lists($pageSize = 15, $selectParams = '*', $withParams = []);

    /**
     * 根据ID获取分类数据
     * @param $categoryId
     * @return Category|null
     */
    public function getCategory($categoryId);

    /**
     * 根据ID更新文章分类
     * @param $categoryId
     * @param array $data
     * @return Category|null
     */
    public function updateCategory($categoryId, array $data);

    /**
     * 保存文章分类
     * @param array $data
     * @return Category
     */
    public function storeCategory(array $data);

    /**
     * 根据ID删除文章分类
     * @param $categoryId
     * @return int
     */
    public function delCategory($categoryId);

}

