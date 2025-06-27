<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RollCommentStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'comment'    => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'comment.required'    => 'Yorum alanı zorunludur.',
        ];
    }
}
