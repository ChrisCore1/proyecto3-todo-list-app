<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'category_id' => ['nullable', 'integer', 'exists:categories,category_id'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['integer', 'exists:tags,tag_id'],
            'status' => 'boolean'
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Es obligatorio colocar un titulo!',
            'title.max' => 'El titulo no debe tener mas de :max caracteres',
            'category_id.exists' => 'No existe la categoria seleccionada',
            'tags.*.exists' => 'No existen algunas de las etiquetas seleccionadas'
        ];
    }
}
