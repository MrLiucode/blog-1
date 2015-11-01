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
     * @return mixed
     */
    public function lists($pageSize = 15);

    /**
     * 根据ID获取分类数据
     * @param $categoryId
     * @return Category|null
     */
    public function getCategory($categoryId);

}
