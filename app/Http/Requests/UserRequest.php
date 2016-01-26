<?php

namespace App\Http\Requests;

class UserRequest extends Request
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
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:16|confirmed',
            'status' => 'required|in:1,-1',
            'group_id' => 'array',
        ];
        if( in_array( strtoupper($this->getMethod()), ['PUT', 'PATCH'] ) ){
            $rules['password'] = 'min:6|max:16|confirmed';
            $rules = array_except($rules, ['email']);
        }
        return $rules;
    }

    public function messages(){
        return [
            'name.required' => '昵称不能为空!',
            'name.max' => '昵称的最大长度为255!',
            'email.required' => '邮箱不能为空!',
            'email.email' => '邮箱格式不正确!',
            'email.unique' => '邮箱地址已存在!',
            'password.required' => '密码不能为空!',
            'password.min' => '密码的最小长度为6!',
            'password.max' => '密码的最大长度为16!',
            'password.confirmed' => '两次密码不一致!',
            'status.required' => '请选择用户状态!',
            'status.in' => '不存在的用户状态!',
            'group_id.array' => '请重新选择权限分组!',
        ];

    }

}
