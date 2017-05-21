<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Comment extends FormRequest
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
            'comment_detail' => 'required|min:10'
        ];
    }

    public function messages()
    {
        return [
            'comment_detail.required' => 'เนื้อหาคอมเม้นต้องไม่เว้นว่าง',
            'comment_detail.min' => 'เนื้อหาคอมเม้นต้องไม่สั้นเกินไป'
        ];
    }
}
