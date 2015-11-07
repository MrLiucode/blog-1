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
            'published_at' => 'required',
        ];
    }

    public function messages(){
        return [
            'title.required' => '文章标题不能为空!',
            'title.max' => '文章标题的字符长度不能超过50!',
            'content.required' => '文章内容不能为空!',
            'category.required' => '文章分类不能为空!',
            'category.numeric' => '请选择正确的文章分类!',
            'tags.required' => '文章标签不能为空!',
            'status.required' => '文章状态不能为空!',
            'is_top.required' => '必须选择是否置顶!',
            'published_at' => '发布日期不能为空!',
        ];
    }

}