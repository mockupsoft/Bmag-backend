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

            'large_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'news_detail_image' => 'nullable|image|mimes:jpg,jpeg,png,webp||max:2048',
            'list_image' => 'nullable|image|mimes:jpg,jpeg,png,webp||max:2048',

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
            'magazine_id.required' => 'Dergi alanı zorunludur.',

            'large_image.image' => 'Büyük görsel geçerli bir resim dosyası olmalıdır.',
            'large_image.mimes' => 'Büyük görsel jpg, jpeg, png veya webp formatında olmalıdır.',
            'large_image.dimensions' => 'Büyük görselin boyutu 1300x720 piksel olmalıdır.',
            'large_image.max' => 'Büyük görsel en fazla 5MB olabilir.',

            'news_detail_image.image' => 'Haber detay görseli geçerli bir resim dosyası olmalıdır.',
            'news_detail_image.mimes' => 'Haber detay görseli jpg, jpeg, png veya webp formatında olmalıdır.',
            'news_detail_image.dimensions' => 'Haber detay görseli 650x360 piksel olmalıdır.',
            'news_detail_image.max' => 'Haber detay görseli en fazla 2MB olabilir.',

            'list_image.image' => 'Liste görseli geçerli bir resim dosyası olmalıdır.',
            'list_image.mimes' => 'Liste görseli jpg, jpeg, png veya webp formatında olmalıdır.',
            'list_image.dimensions' => 'Liste görseli 426x240 piksel olmalıdır.',
            'list_image.max' => 'Liste görseli en fazla 2MB olabilir.',
        ];
    }

}
