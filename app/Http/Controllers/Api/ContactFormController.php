<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ContactFormRequest;
use App\Models\ContactForm;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    public function contact(ContactFormRequest $request)
    {
        ContactForm::query()
            ->create($request->all());

        return response()->json([
            "status" => "success",
            "message" => "Bizimle iletişime geçtiğiniz için teşekkür ederiz. Yakında size geri döneceğiz."
        ], 201);
    }
}
