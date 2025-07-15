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
            'in_title' => 'required|string|max:255',
            'out_title' => 'required|string|max:255',
            'summary' => 'required|string|max:1000',
            'content' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'magazine_id' => 'required|integer|exists:magazines,id',
            'large_image' => 'nullable',
            'news_detail_image' => 'nullable',
            'list_image' => 'nullable',
            'tags' => 'nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'in_title.required' => 'İç başlık alanı zorunludur.',
            'out_title.required' => 'Dış başlık alanı zorunludur.',
            'summary.required' => 'Özet alanı zorunludur.',
            'content.required' => 'İçerik alanı zorunludur.',
            'category_id.required' => 'Kategori alanı zorunludur.',
            'magazine_id.required' => 'Degi alanı zorunludur.',
            'large_image.required' => 'Resim alanı zorunludur.',
            'news_detail_image.required' => 'Resim alanı zorunludur.',
            'list_image.required' => 'Resim alanı zorunludur.',
        ];
    }
}
