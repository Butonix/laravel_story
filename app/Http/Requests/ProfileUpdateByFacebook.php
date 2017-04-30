<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateByFacebook extends FormRequest
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
        $id = $this->user()->id;
        return [
            'author' => 'min:4|max:50|unique:member,author,' . $id
        ];
    }

    public function messages()
    {
        return [
            'author.required' => 'กรุณาตรวจสอบ ชื่อ/นามปากกา อีกครั้ง',
            'author.unique' => 'ชื่อ/นามปากกา มีผู้อื่นใช้แล้ว'
        ];
    }
}
