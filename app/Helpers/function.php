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
 * 前台视图
 * @param $view
 * @return mixed
 */
function fontView($view){
    $args = func_get_args();
    $args[0] = 'theme.' . env('THEME') . '.' . $view;
    return call_user_func_array('view', $args);
}

/**
 * 后台视图
 * @param $view
 * @return mixed
 */
function adminView($view){
    $args = func_get_args();
    $args[0] = 'admin.' . $view;
    return call_user_func_array('view', $args);
}

/**
 * 以指定KEY作为索引返回值组
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
 * 根据键组获取值组
 * @param array $key_array
 * @param array $value_array
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
 * 根据键获取值组
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
 * 渲染成功页面
 * @param string $url
 * @param string $message
 * @return \Illuminate\Http\RedirectResponse
 */
function success($url, $message = ''){
    return redirect($url)->with('message', $message);
}

/**
 * 渲染错误
 * @param string $message
 * @param string $url
 * @param int $status
 * @return $this
 */
function error($message, $url = '',  $status = 422){
    return $url ? redirect($url, $status)->withErrors($message) : redirect()->back()->withErrors($message)->withInput(\Illuminate\Support\Facades\Input::all());
}

/**
 * 得到包的路径
 * @param $path
 * @return string
 */
function _package($path){
    return asset('package/' . $path);
}

/**
 * 生成静态文件链接
 * @param string $basePath
 * @param array $fileList
 * @return string
 */
function createConcat($basePath, array $fileList){
    $htmlMap = [
        'js' => '<script type="text/javascript" src="%s"></script>',
        'css' => '<link rel="stylesheet" href="%s">'
    ];
    $extension = pathinfo(head($fileList))['extension'];
    $htmlTpl = array_get($htmlMap, $extension);
    $basePath = rtrim(asset($basePath), '/');
    if(is_null($htmlTpl)){
        return '';
    }
    if(env('TENGINE')){
        return sprintf($htmlTpl, $basePath . '/??' . implode(',', $fileList));
    }
    $htmlStr = '';
    foreach($fileList as $fileName){
        $htmlStr .= sprintf($htmlTpl, $basePath . '/' . $fileName);
    }
    return $htmlStr;
}

/**
 * 获取随机样式
 * @return mixed
 */
function getRandClass(){
    $classMap = [
        'default', 'danger', 'warning', 'success', 'info', 'primary', 'inverse'
    ];
    return $classMap[array_rand($classMap, 1)];
}


/**
 * 提取二维数组里的2个键作为一位数组返回
 * @param array $data
 * @param $keyName
 * @param $valueName
 * @return array
 */
function array_melting(array $data, $keyName, $valueName){
    $result = [];
    foreach($data as $item){
        $value = array_get($item, $valueName);
        if($key = array_get($item, $keyName)){
            $result[$key] = $value;
            continue;
        }
        $result[] = $value;
    }
    return $result;
}

/**
 * 处理Laravel Trace 报文
 *
 * @param string $str
 * @return string
 */
function handelTraceString($str){
    $str = str_replace('#', '#####', $str);
    return \YuanChao\Editor\EndaEditor::MarkDecode($str);

}

