<?php

namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;

class MagazineIssueStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'magazine_id'   => 'required|integer|exists:magazines,id',
            'title'         => 'required|string|max:255',
            'issue_number'  => 'required|string|max:50',
            'issue_date'    => 'required|date',
            'cover_image'   => 'required|file|max:255',
            'pdf_path'      => 'required|file|max:255',
            'barcode'       => 'required|max:255',
            'price'         => 'required|numeric|min:0',
            'vat_price'     => 'required|numeric|min:0',
            'stock'         => 'required|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'magazine_id.required'   => 'Dergi seçimi zorunludur.',

            'title.required'         => 'Başlık alanı zorunludur.',
            'title.max'              => 'Başlık en fazla 255 karakter olabilir.',

            'issue_number.required'  => 'Sayı numarası zorunludur.',
            'issue_number.max'       => 'Sayı numarası en fazla 50 karakter olabilir.',

            'issue_date.required'    => 'Yayın tarihi zorunludur.',
            'issue_date.date'        => 'Geçerli bir tarih giriniz.',

            'cover_image.required'   => 'Kapak görseli zorunludur.',

            'pdf_path.required'      => 'PDF zorunludur.',

            'barcode.required'       => 'Barkod alanı zorunludur.',
            'barcode.max'            => 'Barkod en fazla 255 karakter olabilir.',

            'price.required'         => 'Fiyat alanı zorunludur.',
            'price.numeric'          => 'Fiyat sayısal bir değer olmalıdır.',

            'vat_price.required'     => 'KDV’li fiyat alanı zorunludur.',

            'stock.required'         => 'Stok miktarı zorunludur.',
            'stock.min'              => 'Stok değeri sıfırdan küçük olamaz.'
        ];
    }
}
