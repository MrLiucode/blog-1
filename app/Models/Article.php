<?php
/**
 * Article.php
 *
 * Part of newblog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */

namespace App\Models;

class Article extends BaseModel
{

    protected $dates = ['created_at', 'published_at', 'updated_at'];

    protected $table = 'articles';

//    protected $with = ['user', 'tags'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', time())
            ->where('status', '=', 1);
    }

    public function scopeOrderByPublished($query)
    {
        return $query->orderBy('published_at', 'DESC');
    }

    public function scopeOrderByHits($query)
    {
        return $query->orderBy('hits', 'DESC');
    }

    public function getPublishedAtAttribute($value)
    {
        return date('Y-m-d', $value);
    }

}
