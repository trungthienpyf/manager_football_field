<?php

namespace App\Http\Requests\CategoryPeople;

use App\Models\Area;
use App\Models\CategoryPeople;
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
            'category' =>[
                'required',
                Rule::exists(CategoryPeople::class,'id')
            ]
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge(['category' => $this->route('category')]);
    }

    public function messages()
    {
        return [
            'required'=>'Không được để trống ID',
            'exists' =>'ID không tồn tại',
        ];
    }
}
