<?php
/**
 * BaseModel.php
 *
 * Part of blog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */
 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class BaseModel extends  Model{

    protected $guarded = [];    //默认允许批量赋值

    protected function getDateFormat()
    {
        return 'U'; //转为int型
    }

    /**
     * 批量插入
     * @param array $dataArr    要插入的数组
     * @param bool|false $asymmetry 参数列表是否对齐
     * @return bool 插入结果
     */
    public function batchInsert(array $dataArr, $asymmetry = false){

        if($asymmetry){

            return DB::table($this->table)->insert($dataArr);
        }

        DB::beginTransaction();
        foreach($dataArr as $arr){

            if(!self::create($arr)){
                DB::rollback();
            }
        }
        DB::commit();

        return true;
    }

}
