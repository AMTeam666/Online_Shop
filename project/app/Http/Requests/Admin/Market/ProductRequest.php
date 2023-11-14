<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     
            'product_name' => 'required|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
            'product_image' => 'required|image|mimes:png,jpg,jpeg,gif',
            'description' => 'required|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,)(.:: ]+$/u',       
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'age_range' => 'required|numeric',
            'gender' => 'required|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
            'stock_status' => 'required|numeric|in:0,1',
            'category_id' => 'required|min:1|regex:/^[0-9]+$/u|exists:product_categories,id',
            'brand_id' => 'required|min:1|regex:/^[0-9]+$/u|exists:brands,id',
            // 'user_id' => 'required|min:1|regex:/^[0-9]+$/u|exists:users,id',

        ];
    }
}
