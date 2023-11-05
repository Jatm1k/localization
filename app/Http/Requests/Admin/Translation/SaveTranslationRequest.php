<?php

namespace App\Http\Requests\Admin\Translation;

use Illuminate\Foundation\Http\FormRequest;

class SaveTranslationRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            'text' => array_filter($this->input('text'))
        ]);
    }
    public function rules(): array
    {
        return [
            'group' => ['required', 'string', 'max:50'],
            'key' => ['required', 'string', 'max:50'],
            'text' => ['required', 'array', 'min:1'],
            'text.*' => ['required', 'string'],
        ];
    }
}
