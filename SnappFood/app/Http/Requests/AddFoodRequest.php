<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddFoodRequest extends FormRequest
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
            'name' => 'required',
            'raw_material' => 'required',
            'price' => 'required|integer',
            'image' => 'required|mimes:jpg,png,jpeg|max:10096',
            'food-category' => ''
        ];
    }
}
