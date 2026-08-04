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
}
