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

use App\Models\Category;

class ArticleCategory implements \App\Contracts\ArticleCategory{


    /**
     * 获取所有的的分类
     * @param int $pageSize
     * @return Category
     */
    public function all($pageSize = 10)
    {
        return Category::paginate($pageSize);
    }

    /**
     * 根据ID获取文章文类
     * @param int $categoryId
     * @return Category
     */
    public function findById($categoryId)
    {
        return Category::findOrFail(intval($categoryId));
    }


}
