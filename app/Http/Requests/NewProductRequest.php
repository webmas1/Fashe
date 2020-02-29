<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewProductRequest extends FormRequest
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
            'cat_id' => 'required|numeric',
            'name' => 'required|min:3|max:25|unique:products,name',
            'desc' => 'required|min:10|max:500',
            'price' => 'required|numeric|gt:0',
            'image' => 'file|image'
        ];
    }
}
