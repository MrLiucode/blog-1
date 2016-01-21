<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TagRequest extends Request
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
            'name' => 'required|unique:tags|max:30|min:2'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '标签不能为空!',
            'name.unique' => '标签已存在!',
            'name.max' => '标签最大长度不能大于30!',
            'name.min' => '标签最小长度不能小于2!',
        ];
    }

}
