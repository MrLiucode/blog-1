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
 
namespace App\Models;

class Category extends BaseModel{

    protected $table = 'categories';

    public function article()
    {
        return $this->belongsToMany(Article::class);
    }
}
