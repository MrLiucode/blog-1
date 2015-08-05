<?php
/**
 * ArticleTags.php
 *
 * Part of blog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */
 
namespace App\Models;

class ArticleTags extends BaseModel{

    protected $table = 'article_tags';
    protected $guarded = [];    //支持所有批量更新

    public function article(){
        return $this->hasOne('App\\Models\\Article', 'id', 'aid');
    }

    public function tags(){
        return $this->hasOne('App\\Models\\Tags', 'id', 'tid');
    }

}
