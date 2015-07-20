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
 * Ä£°æ¸³Öµ
 */
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
 * xäÖÈ¾Ä£°æ
 * @param null $view
 * @param array $data
 * @param array $mergeData
 * @return \Illuminate\View\View
 */
function display($view = null, $data = [], $mergeData = []){

    return view(env('THEME') . '.' . $view, $data, $mergeData);
}


