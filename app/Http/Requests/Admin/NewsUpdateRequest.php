<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'         => 'required|string|max:255',
            'summary'       => 'required|string|max:1000',
            'content'       => 'required|string',
            'category_id'   => 'nullable|integer|exists:categories,id',
            'magazine_id'   => 'nullable|integer|exists:magazines,id',
            'meta_robots'   => 'nullable|string|max:255',
            'image'         => 'nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Başlık alanı zorunludur.',
            'summary.required' => 'Özet alanı zorunludur.',
            'content.required' => 'İçerik alanı zorunludur.'
        ];
    }
}
