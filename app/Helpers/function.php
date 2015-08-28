<?php
/**
 * function.php
 *
 * Part of newblog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */

/**
 * 加载前端视图
 * @param string $view
 */
function fontView($view){
    $args = func_get_args();
    $args[0] = 'theme.' . env('THEME') . '.' . $view;
    call_user_func_array('view', $args);
}

/**
 * 加载后端视图
 * @param string $view
 */
function adminView($view){
    $args = func_get_args();
    $args[0] = 'admin.' . $view;
    call_user_func_array('view', $args);
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
    return $url ? redirect($url, $status)->withErrors($message) : redirect()->back()->withErrors($message)->withInput(\Illuminate\Support\Facades\Input::all());
}