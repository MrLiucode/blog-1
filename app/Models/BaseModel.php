<?php
/**
 * BaseModel.php
 *
 * Part of newblog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model{

    protected $dates = ['created_at', 'updated_at'];

    protected $guarded = [];

    protected function getDateFormat()
    {
        return 'U';
    }

    public function batchInsert(array $dataArr){

        if(empty($dataArr)){
            return true;
        }
        $time = time();
        foreach($dataArr as &$list){
            $list['created_at'] = $time;
            $list['updated_at'] = $time;
        }

        return DB::table($this->table)->insert($dataArr);
    }


    public function scopeMultiwhere($query, $arr)
    {
        if (!is_array($arr)) {
            return $query;
        }

        foreach ($arr as $key => $value) {
            $query = $query->where($key, $value);
        }
        return $query;
    }
}

