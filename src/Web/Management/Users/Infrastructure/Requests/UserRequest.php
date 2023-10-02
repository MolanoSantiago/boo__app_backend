<?php

namespace Hex\Web\Management\Users\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:40',
            'surname' => 'required|string|max:60',
            'email' => 'required|string|max:150|email|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ];
    }
}
