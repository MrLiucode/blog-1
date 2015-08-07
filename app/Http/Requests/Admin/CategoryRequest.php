<?php
/**
 * CategoryRequest.php
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

class CategoryRequest extends Request{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'name' => 'required|max:15',
            'remark' => 'max:200',
            'sort' => 'numeric',
            'target' => 'boolean'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '分类名称不能为空!',
            'name.max' => '分类名称的长度不能超过15个字符!',
            'remark.max' => '分类描述的长度不能超过200个字符!',
            'sort.numeric' => '排序值必须为数字!',
            'target.boolean' => '打开方式选择不正确!',
        ];
    }

}
