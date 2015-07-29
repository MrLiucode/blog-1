<?php
/**
 * OptionRequest.php
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

class OptionRequest extends Request
{
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
            'website_title' => 'max:50',
            'website_keyword' => 'max:255',
            'website_author' => 'max:100',
            'website_icp' => 'max:100'
        ];
    }

    public function messages()
    {
        return [
            'website_title.max' => '标题字符长度不能超过50!',
            'website_keyword.max' => '关键词的字符长度不能超过255!',
            'website_author.max' => '作者的字符长度不能超过100!',
            'website_icp.max' => '备案号的字符长度不能超过100!',
        ];
    }

}

