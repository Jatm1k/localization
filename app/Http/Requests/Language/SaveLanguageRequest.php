<?php

namespace App\Http\Requests\Language;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveLanguageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['required', 'string', 'max:10', Rule::unique('languages')->ignore($this->id)],
            'name' => ['required', 'string', 'max:50'],
            'active' => ['nullable', 'bool'],
            'default' => ['nullable', 'bool'],
            'fallback' => ['nullable', 'bool'],
        ];
    }
}
