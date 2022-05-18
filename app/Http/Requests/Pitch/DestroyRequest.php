<?php

namespace App\Http\Requests\Pitch;

use App\Models\Pitch;
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
            'pitch' =>[
                'required',
                Rule::exists(Pitch::class,'id')
            ]
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge(['pitch' => $this->route('pitch')]);
    }

    public function messages()
    {
        return [
            'required'=>'Không được để trống ID',
            'exists' =>'ID không tồn tại',
        ];
    }
}
