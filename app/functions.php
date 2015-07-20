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


