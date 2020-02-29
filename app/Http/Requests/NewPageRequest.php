<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewPageRequest extends FormRequest
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
            'name' => 'required|min:3|max:25|unique:pages,name',
            'url' => 'required|min:3|max:25|unique:pages,url_name',
            'headline' => 'required|min:3|max:255',
            'content' => 'required', 
            'image' => 'image'
        ];
    }
}
