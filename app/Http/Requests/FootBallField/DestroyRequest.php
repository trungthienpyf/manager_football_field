<?php

namespace App\Http\Requests\FootBallField;

use App\Models\CategoryPeople;
use App\Models\FootBallField;
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
            'football_field' =>[
                'required',
                Rule::exists(FootBallField::class,'id')
            ]
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge(['football_field' => $this->route('football_field')]);
    }

    public function messages()
    {
        return [
            'required'=>'Không được để trống ID',
            'exists' =>'ID không tồn tại',
        ];
    }
}
