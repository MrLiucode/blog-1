<?php
/**
 * Tags.php
 *
 * Part of newblog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */

namespace App\Models;

class Tag extends BaseModel
{

    protected $table = 'tags';

    public function article()
    {
        return $this->belongsToMany(Article::class);
    }

    public function scopeTagName($query, array $tagName = [])
    {
        return $query->whereIn('name', $tagName);
    }

    public function scopeTagId($query, $tagId)
    {
        return $query->where('id', $tagId);
    }

}
