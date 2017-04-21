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
            'author' => 'required|min:4|max:50|unique:member,author,'.$id,
            'email' => 'required|email|unique:member,email,'.$id,
            'password' => 'min:4|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'author.unique' => 'ชื่อ/นามปากกา มีผู้อื่นใช้แล้ว',
            'email.unique' => 'อีเมลนี้มีผู้อื่นใช้แล้ว',
            'password.confirmed' => 'กรุณาตรวจสอบรหัสผ่านให้ตรงกัน'
        ];
    }
}
