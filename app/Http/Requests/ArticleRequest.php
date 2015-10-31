<?php
/**
 * ArticleRequest.php
 *
 * Part of GoldAccount.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */

namespace App\Http\Requests;

class ArticleRequest extends Request{


    public function authorize(){

        return true;
    }

    public function rules(){
        return [
            'title' => 'required|max:50',
            'content' => 'required',
            'category' => 'required|numeric',
            'tags' => 'required',
            'status' => 'required',
            'is_top' => 'required',
        ];
    }

    public function messages(){
        return [
            'title.required' => '文章标题不能为空!',
            'title.max' => '文章标题的长度不能超过50!',
            'content' => '文章内容不能为空!',
            'category.required' => '请选择文章分类!',
            'category.numeric' => '请选择正确的文章分类!',
            'tags.required' => '文章标签不能为空!',
            'status.required' => '请选择文章状态!',
            'is_top.required' => '请选择文章是否置顶!',
        ];
    }

}