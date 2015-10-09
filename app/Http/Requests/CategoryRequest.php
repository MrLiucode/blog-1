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
            'name' => 'required|max:30|min:2',
            'description' => 'max:100',
            'order' => 'numeric|min:100',
        ];
    }

    public function messages(){

        return [
            'name.required' => '分类名称不能为空!',
            'name.max' => '分类名称的长度不能超过30!',
            'name.min' => '分类名称的长度不能小于2!',
            'description' => '分类描述的长度不能超过100!',
            'order.numeric' => '分类排序必须是数字!',
            'order.min' => '分类排序不能小于100!',
        ];
    }

}