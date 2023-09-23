<?php

namespace Hex\Web\Authentication\Login\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|string|max:255|email',
            'password' => "required|string|min:8",
        ];
    }
}
