<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TagRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name_tag' => [
                'required', 'string', 'max:50',
                Rule::unique('tags', 'name_tag')->ignore($this->route('tag')),
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'name_tag.required' => 'Es necesario colocar un nombre!',
            'name_tag.max' => 'El nombre no puede tener mas de :max caracteres',
            'name_tag.unique' => 'Ya existe una etiqueta con ese mismo nombre!'
        ];
    }
}
