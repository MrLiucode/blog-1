<?php
/**
 * TagRepo.php
 *
 * Part of blog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */

namespace App\Repositories;

use App\Models\Tags;
use Cache;

class TagRepo{

    private $cache_prefix = 'blog_tags';

    /**
     * 去除标签空格
     * @param string $str
     * @return mixed
     */
    private function _trim($str){
        if(!is_string($str) || empty($str)) return $str;
        str_replace(' ', '', $str);
        return $str;
    }

    public function tag($tag){
        $tagArr = is_string($tag) ? explode(',', $this->_trim($tag)) : (array)$tag;
        $tagModel = new Tags();
        $tagRes = $tagModel->tagName($tagArr)->get()->toArray();
        $tagRes = array_get_value($tagRes, 'name');
        $result = array_diff($tagArr, $tagRes);
        $data = [];
        foreach($result as $value){
            $data[] = ['name' => $value];
        }
        $result = $tagModel->batchInsert($data);
        $result && $this->refreshCache();  //刷新缓存
        return $result;
    }

    public function refreshCache(){
        Cache::forget($this->cache_prefix);
        $list = Tags::all()->toArray();
        Cache::forever($this->cache_prefix, $list);
    }

    public function getList(){
        return Cache::get($this->cache_prefix, []);
    }

}
 

