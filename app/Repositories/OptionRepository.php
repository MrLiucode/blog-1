<?php
/**
 * SystemOptionRepository.php
 *
 * Part of blog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */
namespace App\Repositories;

use App\Models\SystemOptions;
use Session;

class OptionRepository{

    protected $cacheKey = 'system.option';
    protected $optionModel;

    public function __construct(SystemOptions $systemOptions){

        $this->optionModel = $systemOptions;
    }

    public function optionList(){

        $list = Session::get($this->cacheKey);

        if(is_null($list)){

            $result = $this->optionModel->get()->toArray();
            foreach($result as $item){

                $dataArr[$item['name']] = $item['value'];
            }


            Session::put($this->cacheKey, $dataArr);
            return $this->optionList();
        }

        return $list;
    }

    public function update(array $dataArr){

        $result = $this->optionModel->updateOption($dataArr);

        Session::forget($this->cacheKey);

        return true;
    }



}
