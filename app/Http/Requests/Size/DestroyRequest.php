<?php

namespace App\Http\Requests\Size;

use App\Models\Area;
use App\Models\Size;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DestroyRequest extends FormRequest
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
            'size' =>[
                'required',
                Rule::exists(Size::class,'id')
            ]
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge(['size' => $this->route('size')]);
    }

    public function messages()
    {
        return [
            'required'=>'Không được để trống ID',
            'exists' =>'ID không tồn tại',
        ];
    }
}
