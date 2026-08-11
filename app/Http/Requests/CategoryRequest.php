<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name_category' => [
                'required', 'string', 'max:50',
                Rule::unique('categories', 'name_category')->ignore($this->route('category')),
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'name_category.required' => 'Es necesario colocar un nombre!',
            'name_category.max' => 'El nombre no puede tener mas de :max caracteres',
            'name_category.unique' => 'Ya existe una categoria con ese mismo nombre!'
        ];
    }
}
