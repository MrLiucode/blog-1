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
 * ����ǰ����ͼ
 * @param string $view
 */
function fontView($view){
    $args = func_get_args();
    $args[0] = 'theme.' . env('THEME') . '.' . $view;
    call_user_func_array('view', $args);
}

/**
 * ���غ����ͼ
 * @param string $view
 */
function adminView($view){
    $args = func_get_args();
    $args[0] = 'admin.' . $view;
    call_user_func_array('view', $args);
}


/**
 * ���������ĳһ����ֵ��Ϊ���������������
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
 * ����ָ���ļ�����ֵ��ȡֵ
 * @param array $key_array  ��
 * @param array $value_array    ����ֵ����
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
 * ��ȡ������ĳ������ֵ����һλ����ķ�ʽ����
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
 * �ɹ�����
 * @param string $url
 * @param string $message
 * @return \Illuminate\Http\RedirectResponse
 */
function success($url, $message = ''){
    return redirect($url)->with('message', $message);
}

/**
 * ���ش���
 * @param string $message
 * @param string $url
 * @param int $status
 * @return $this
 */
function error($message, $url = '',  $status = 422){
    return $url ? redirect($url, $status)->withErrors($message) : redirect()->back()->withErrors($message)->withInput(\Illuminate\Support\Facades\Input::all());
}