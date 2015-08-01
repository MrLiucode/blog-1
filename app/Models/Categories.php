<?php
/**
 * Category.php
 *
 * Part of blog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */
namespace App\Models;
 
class Categories extends BaseModel{

    protected $table = 'article_categories';
    protected $guarded = [];    //支持所有批量更新

}
