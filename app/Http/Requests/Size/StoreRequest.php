<?php

namespace App\Http\Requests\Size;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'size'=>[
                'bail',
                'required',
                'unique:App\Models\Size,size',
            ]
        ];
    }

    public function messages()
    {
        return[
            'required'=>'Không được để trống',
            'unique'=>'Tên bị trùng',
        ];
    }
}
