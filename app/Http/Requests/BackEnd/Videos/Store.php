<?php

namespace App\Http\Requests\BackEnd\Videos;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'name'=>['string','required','max:20'],
            'des'=>['min:10'],
            'meta_des'=>['max:255'],
            'meta_keywords'=>['max:255'],
            'youtube'=>['required','url','min:20'],
            'cat_id'=>['required','int'],
            'published'=>['required'],
            'image'=>['required','url'],
        ];
    }

}
