<?php
/**
 * functions.php
 *
 * Part of blog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */

/**
 * ģ�渳ֵ
 */

function get_theme(){
    return env('THEME');
}

function assign(){

    $args = func_get_arg();
    $data = count($args)==2 && is_string($args[0]) ? [$args[0] => $args[1]] : $args;

    if(!empty($data)){

        foreach($data as $key => $value){
            view()->share($key, $value);
        }
    }

}

/**
 * x��Ⱦģ��
 * @param null $view
 * @param array $data
 * @param array $mergeData
 * @return \Illuminate\View\View
 */
function display($view = null, $data = [], $mergeData = []){

    return view(get_theme() . '.' . $view, $data, $mergeData);
}

function _asset($path, $secure = null){
    return asset(get_theme() . '/' . $path, $secure);
}

function _package($path, $secure = null){
    return asset('package/' . $path, $secure);
}

/**
 * 将数组里的某一个键值作为数组的索引并返回
 * @param array $array
 * @param $key
 * @return array
 */
function array_key_advance(array $array ,$key){
    $result = array();
    foreach($array as $item){
        $field = array_get($item, $key);
        if(is_null($field)){
            $result[] = $item;
        }else{
            $result[$field] = $item;
        }
    }
    return $result;
}
/**
 * 根据指定的键数组值获取值
 * @param array $key_array  键
 * @param array $value_array    所有值数组
 * @return array
 */
function array_get_all(array $key_array, array $value_array){
    $result = array();
    foreach($key_array as $key){
        $result[$key] = array_get($value_array, $key);
    }
    return $result;
}

/**
 * 获取数组中某个键的值，以一位数组的方式返回
 * @param array $array
 * @param $key
 * @return array
 */
function array_get_value(array $array, $key){
    $result = [];
    if($array && $key){
        foreach($array as $item){
            if($res = array_get($item, $key)){
                $result[] = $res;
            }
        }
    }
    return $result;
}

/**
 * 成功返回
 * @param string $url
 * @param string $message
 * @return \Illuminate\Http\RedirectResponse
 */
function success($url, $message = ''){
    return redirect($url)->with('message', $message);
}

/**
 * 返回错误
 * @param string $message
 * @param string $url
 * @param int $status
 * @return $this
*/
function error($message, $url = '',  $status = 422){
    return $url ? redirect($url, $status)->withErrors($message) : redirect()->back()->withErrors($message)->withInput(Input::all());
}

/**
 * 获取标签颜色
 * @return mixed
 */
function tagColor(){
    $color = ['', 'label-default', 'label-primary', 'label-success', 'label-info', 'label-warning', 'label-danger'];
    return $color[array_rand($color)];
}

function _trim($str){
    str_replace(' ', '', $str);
    str_replace('\r', '', $str);
    str_replace('\n', '', $str);
    str_replace('\r\n', '', $str);
    return $str;
}

