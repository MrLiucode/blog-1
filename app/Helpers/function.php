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

function fontView($view){
    $args = func_get_args();
    $args[0] = 'theme.' . env('THEME') . '.' . $view;
    return call_user_func_array('view', $args);
}

function adminView($view){
    $args = func_get_args();
    $args[0] = 'admin.' . $view;
    return call_user_func_array('view', $args);
}


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


function array_get_all(array $key_array, array $value_array){
    $result = array();
    foreach($key_array as $key){
        $result[$key] = array_get($value_array, $key);
    }
    return $result;
}

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

function success($url, $message = ''){
    return redirect($url)->with('message', $message);
}

function error($message, $url = '',  $status = 422){
    return $url ? redirect($url, $status)->withErrors($message) : redirect()->back()->withErrors($message)->withInput(\Illuminate\Support\Facades\Input::all());
}

function asset($path){
    return url() . '/' . $path;
}

function _package($fileName){
    return asset('package/' . $fileName);
}