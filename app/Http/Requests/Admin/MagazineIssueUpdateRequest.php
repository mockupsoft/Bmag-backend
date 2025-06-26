<?php

namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;

class MagazineIssueUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'description'   => 'required|string',
            'issue_code'    => 'required|string|max:50',
            'issue_date'    => 'required|date',
            'barcode'       => 'required|string|max:255',
            'price'         => 'required|numeric|min:0',
            'vat_price'     => 'required|numeric|min:0',
            'stock'         => 'required|integer|min:0',
            'delete_file' => 'nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'description.required'      => 'Açıklama numarası zorunludur.',

            'issue_code.required'     => 'Sayı numarası zorunludur.',
            'issue_code.max'          => 'Sayı numarası en fazla 50 karakter olabilir.',

            'issue_date.required'    => 'Yayın tarihi zorunludur.',
            'issue_date.date'        => 'Geçerli bir tarih giriniz.',

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
