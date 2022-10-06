<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookFormRequest extends FormRequest
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

            'title'  =>"required",
            'authors'  =>"required",
            'description' =>"nullable",
            'released_at' =>"required|date",
            'cover_image' =>"nullable|url",
            'pages'  => "required",
            'language_code' =>"required",
            'isbn' =>"required",
            'in_stock'  => "required",
            'genres' => 'nullable|array'
    ];
    }
}
