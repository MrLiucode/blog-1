<?php
/**
 * SystemOptions.php
 *
 * Part of blog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */
 
namespace App\Models;
use DB;

class SystemOptions extends BaseModel{

    protected $table = 'system_option';

    private $attribute = [
        'website_title', 'website_keyword', 'website_description', 'website_author', 'website_icp', 'website_copy', 'website_footer', 'website_motto',
        'mail_drive', 'mail_host', 'mail_port', 'mail_username', 'mail_password', 'mail_encryption'
    ];

    public function updateOption(array $arr){

        DB::beginTransaction();
        foreach($arr as $key => $value){

            //必须要在可设置的键数组范围内
            if(in_array($key, $this->attribute)){

                $option = self::firstOrCreate(['name' => $key ]);
                $option->value = $value;
                if(!$option->save()){

                    DB::rollBack();

                }

            }

        }
        DB::commit();

        return true;

    }

    public function scopeKeyPrefix($query, $prefix){

        return $query->where('name', 'like', "%$prefix%");
    }

}
