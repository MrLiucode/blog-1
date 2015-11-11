<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ACLGroupRequest extends Request
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
            'name' => 'required|max:50',
            'description' => 'max:255',
        ];
    }

    public function messages(){
        return [
            'name.required' => '请填写权限组名称!',
            'name.max' => '权限组名称字符长度不能超过25!',
            'description.max' => '权限组描述字符长度不能超过255!',
        ];
    }

}
