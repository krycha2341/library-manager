<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListBooksRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'limit' => ['required', 'integer'],
            'offset' => ['required', 'integer'],
            'title' => ['string', 'filled'],
            'author' => ['string', 'filled'],
            'first_name' => ['string', 'filled'],
            'last_name' => ['string', 'filled'],
        ];
    }
}
