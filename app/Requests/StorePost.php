<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
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
        //There is option to add custom validate rules, but in this case there is no needed.
        return [
            'name' => 'required|unique:post|min:3|max:255',
            'photos' => 'required',
            'photos.*' => 'required|mimes:png,jpg,jpeg,svg|max:2048'
        ];
    }
}
