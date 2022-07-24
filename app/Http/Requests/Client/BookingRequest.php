<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;



class BookingRequest extends FormRequest
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
        $validation=[
            'name_receive' => [
                'bail',
                'required'
            ],
            'phone' => [
                'bail',
                'required',
                'regex:/(09|01)[0-9]{8}$/'
            ],
            'date' => [
                'bail',
                'required',
                'date',
                'after: yesterday'
            ],
            'email' => [
                'bail',
            ],
            'selector' => [
                'bail',
                'required'
            ],

        ];

        return $validation;
    }

    public function messages()
    {
        return [
            'required' =>':attribute không để trống',
            'regex' =>':attribute không hợp lệ',
            'date'=>':attribute phải là ngày',
            'after'=>':attribute phải từ hôm nay trở về sau',
        ];
    }
    public function attributes()
    {
        return [
            'name_receive' => 'Tên',
            'phone' => 'Số điện thoại',
            'date' => 'Ngày đá',
            'email' => 'Email',
            'selector' => 'Giờ đá',
        ];
    }

}
