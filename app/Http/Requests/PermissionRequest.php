<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PermissionRequest extends Request
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
            'ident' => 'required|max:255',
            'description' => 'required|max:255',
        ];
    }

    public function messages(){
        return [
            'ident.required' => '请填写权限标识!',
            'ident.max' => '权限标识的字符长度不能超过255!',
            'description.required' => '请填写权限描述!',
            'description.max' => '权限描述的字符长度不能超过255!',
        ];
    }
}
