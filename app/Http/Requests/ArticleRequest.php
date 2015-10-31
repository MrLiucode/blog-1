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
        ];
    }

    public function messages(){
        return [
            'title.required' => '���±��ⲻ��Ϊ��!',
            'title.max' => '���±���ĳ��Ȳ��ܳ���50!',
            'content' => '�������ݲ���Ϊ��!',
            'category.required' => '��ѡ�����·���!',
            'category.numeric' => '��ѡ����ȷ�����·���!',
            'tags.required' => '���±�ǩ����Ϊ��!',
            'status.required' => '��ѡ������״̬!',
            'is_top.required' => '��ѡ�������Ƿ��ö�!',
        ];
    }

}