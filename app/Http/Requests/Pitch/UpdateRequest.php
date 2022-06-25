<?php

namespace App\Http\Requests\Pitch;

use App\Enums\PitchStatusEnum;
use App\Models\Area;
use App\Models\Size;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'name' => [
                'bail',
                'required',
            ],
            'price' => [
                'bail',
                'required',
                'gt:0'
            ],
            'img' => [
                'nullable',
                'file',
                'image',
            ],
            'status' => [
                'required',
                Rule::in(PitchStatusEnum::asArray()),
            ],



            'img_old'=>[

            ]
        ];
    }

    public function messages()
    {
        return [
            'required' =>':attribute không để trống',
            'gt' =>':attribute không được để âm',
            'exists' =>':attribute phải là tồn tại',
            'required_if'=>':attribute 7 phải chọn thuộc loại sân lớn'
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên',
            'price' => 'Giá',
            'status' => 'Trạng thái',


            'pitch_id'=> 'Sân'
        ];
    }
}
