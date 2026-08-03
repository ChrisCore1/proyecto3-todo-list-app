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
}
