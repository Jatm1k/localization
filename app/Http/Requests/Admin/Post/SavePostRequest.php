<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class SavePostRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            'title' => array_filter($this->input('title'))
        ]);
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'array', 'min:1'],
            'title.*' => ['required', 'string'],
            'languages' => ['nullable', 'array'],
            'languages.*' => ['required', 'string', 'exists:languages,id'],
        ];
    }
}
