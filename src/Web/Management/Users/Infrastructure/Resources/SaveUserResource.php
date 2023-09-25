<?php

namespace Hex\Web\Management\Users\Infrastructure\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaveUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $token = $this->createToken('auth-token')->plainTextToken;

        return [
            'user' => [
                'id' => $this['id'],
                'name' => $this['name'],
                'surname' => $this['surname'],
                'email' => $this['email'],
                'user_type' => $this['userType'],
                'created_at' => $this['created_at'],
                'updated_at' => $this['updated_at']
            ],
            'access_token' => $token,
            'token_type' => 'Bearer'
        ];
    }
}
