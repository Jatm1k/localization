<?php

namespace App\Http\Requests\Admin\Translation;

use Illuminate\Foundation\Http\FormRequest;

class FilterTranslationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'group' => ['nullable', 'string', 'max:50'],
            'key' => ['nullable', 'string', 'max:50'],
            'text' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
