<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegisterWriter extends FormRequest
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
            'member_id' => 'unique:member,id,' . $id,
            'full_name' => 'required',
            'id_card' => 'required|numeric|min:13',
            'address' => 'required',
            'tel' => 'required',
            'bank_name' => 'required',
            'bank_sub_branch' => 'required',
            'bank_account_number' => 'required',
            'bank_account_name' => 'required',
            'book_bank_file' => 'required|image',
            'id_card_file' => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'member_id.unique' => 'บัญชีนี้เคยใช้ลงทะเบียนแล้ว',
            'full_name.required' => 'กรุณาตรวจสอบ ชื่อ-นามสกุล อีกครั้ง',
            'id_card.unique' => 'เลขบัตรประชาชนนี้มีผู้อื่นลงทะเบียนแล้ว',
            'id_card.required' => 'กรุณาตรวจสอบเลขบัตรประชาชนอีกครั้ง',
            'id_card.numeric' => 'บัตรประจำตัวประชาชนต้องเป็นตัวเลขเท่านั้น',
            'address.required' => 'กรุณาตรวจสอบที่อยู่อีกครั้ง',
            'tel.required' => 'กรุณาตรวจสอบเบอร์โทรศัพท์อีกครั้ง',
            'bank_name.required' => 'กรุณาตรวจสอบชื่อธนาคารอีกครั้ง',
            'bank_sub_branch.required' => 'กรุณาตรวจสอบสาขาธนาคารอีกครั้ง',
            'bank_account_number.required' => 'กรุณาตรวจสอบเลขที่บัญชีธนาคารอีกครั้ง',
            'bank_account_name.required' => 'กรุณาตรวจสอบชื่อบัญชีธนาคารอีกครั้ง',
            'book_bank_file.required' => 'กรุณาตรวจสอบไฟล์รูปภาพบัญชีธนาคารอีกครั้ง',
            'id_card_file.required' => 'กรุณาตรวจสอบไฟล์รูปภาพบัตรประชาชนอีกครั้ง',
            'book_bank_file.image' => 'กรุณาตรวจสอบไฟล์รูปภาพบัญชีธนาคารอีกครั้ง',
            'id_card_file.image' => 'กรุณาตรวจสอบไฟล์รูปภาพบัตรประชาชนอีกครั้ง'
        ];
    }
}
