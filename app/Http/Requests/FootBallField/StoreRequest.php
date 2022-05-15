<?php

namespace App\Http\Requests\FootBallField;

use App\Enums\FootBallFieldStatusEnum;
use App\Models\Area;
use App\Models\CategoryPeople;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
                Rule::in(FootBallFieldStatusEnum::asArray()),
            ],
            'area_id' => [
                'required',
                Rule::exists(Area::class, 'id'),
            ],
            'category_id' => [
                'required',
                Rule::exists(CategoryPeople::class, 'id'),
            ]
        ];
    }
}