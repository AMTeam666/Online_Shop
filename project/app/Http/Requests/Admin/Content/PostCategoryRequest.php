<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Foundation\Http\FormRequest;

class PostCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {   
            return [
                'name' => 'required|max:120|min:3|regex:/^[ا-یa-zA-Z0-9\ِ., ]+$/u',
                'tags' => 'required|regex:/^[ا-یa-zA-Z0-9\ِ., ]+$/u',
            ];
         
    }
}
