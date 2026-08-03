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
}
