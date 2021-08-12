<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'subject' => ['required', 'string'],
            'message' => ['required', 'string'],
            'attachment' => ['required', 'file'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
