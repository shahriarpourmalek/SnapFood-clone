<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CommentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            'food_id' => ['nullable', Rule::requiredIf(is_null($this->resturant_id)), Rule::exists('foods', 'id')],
            'resturant_id' => ['nullable', Rule::requiredIf(is_null($this->food_id)), Rule::exists('resturants', 'id')],

        ];
    }
}
