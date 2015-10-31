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
     * @param int $pageSize
     * @return mixed
     */
    public function lists($pageSize = 15)
    {
        return CategoryModel::paginate($pageSize);
    }

}

