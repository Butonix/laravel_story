<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileUpdate extends FormRequest
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
            'author' => 'min:4|max:50|unique:member,author,' . $id,
            'email' => 'required|email|unique:member,email,' . $id,
            'password' => 'required|min:4|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'author.required' => 'กรุณาตรวจสอบ ชื่อ/นามปากกา อีกครั้ง',
            'author.unique' => 'ชื่อ/นามปากกา มีผู้อื่นใช้แล้ว',
            'email.required' => 'กรุณาตรวจสอบอีเมลอีกครั้ง',
            'email.unique' => 'อีเมลนี้มีผู้อื่นใช้แล้ว',
            'password.required' => 'กรุณาตรวจสอบรหัสผ่านอีกครั้ง',
            'password.confirmed' => 'กรุณาตรวจสอบรหัสผ่านให้ตรงกัน'
        ];
    }
}
