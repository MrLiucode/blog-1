<?php namespace App\Http\Requests;

class FriendshipRequest extends Request
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
            'name' => 'required|min:2|max:100',
            'url' => 'required|url',
            'logo_path' => 'required|url',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '商家名称不能为空!',
            'name.min' => '商家名称最小长度为2个字符!',
            'name.max' => '商家名称最大长度为100个字符!',
            'url.required' => '商家链接地址不能为空!',
            'url.url' => '商家链接地址不正确!',
            'logo_path.required' => '商标链接地址不能为空!',
            'logo_path.url' => '商标链接地址不正确!',
        ];
    }

}
