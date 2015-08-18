<?php
/**
 * ArticleRequest.php
 *
 * Part of blog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class ArticleRequest extends Request{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $description = $this->description ? $this->description : mb_substr(htmlspecialchars_decode(strip_tags($this->content_html)), 0, 200) . '...';
        $this->getInputSource()->set('description', $description);
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:100',
            'content' => 'required',
            'content_html' => 'required',
            'type' => 'required|numeric',
            'author' => 'required|max:20',
            'status' => 'required|in:-1,0,1'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '文章标题不能为空!',
            'title.max' => '文章标题的长度不能超过100个字符!',
            'content.required' => '文章内容不能为空!',
            'content_html.required' => 'HTML内容丢失!',
            'type.required' => '请选择文章类型!',
            'type.numeric' => '该文章类型不存在!',
            'author.required' => '作者不能为空!',
            'author.max' => '作者的文字长度不能超过20个字符!',
            'status.required' => '请选择是否置顶!',
            'status.in' => '不存在该状态!',
        ];
    }
}

