<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateMember extends FormRequest
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
    public function rules(Request $request)
    {
        $id = $request->id;

        return [
            'email' => 'required|unique:member,email,'.$id,
            'author' => 'unique:member,author,'.$id,
            'password' => 'confirmed|min:4'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'กรุณากรอกข้อมูลอีเมล',
            'email.unique' => 'อีเมลนี้มีผู้อื่นใช้แล้ว',
            'author.unique' => 'นามนักเขียนนี้มีผู้อื่น้แล้ว',
            'password.confirmed' => 'กรุณาตรวจสอบรหัสผ่านให้ตรงกัน'
        ];
    }
}
