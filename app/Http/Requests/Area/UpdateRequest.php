<?php

namespace App\Http\Requests\Area;

use App\Models\Area;
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
            'name'=>[
                'bail',
                'required',
                Rule::unique(Area::class)->ignore($this->area),
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
