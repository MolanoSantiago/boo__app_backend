<?php

namespace Hex\Web\Authentication\Login\Infrastructure\Persistence\Repositories\Eloquent;

use App\Models\User;
use Hex\Web\Authentication\Login\Domain\Contracts\LoginRepositoryInterface;
use Hex\Web\Authentication\Login\Domain\Login;

class LoginRepository implements LoginRepositoryInterface
{
    private User $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function login(Login $login): ?array
    {
        $user = $this->findUserByEmail($login->getEmail());

        if (!$user) return null;

        $check = $login->passwordMatches($user->password);
        if (!$check) return null;

        $token = $user->createToken('auth-token')->plainTextToken;

        $user->load('userType:id,name');

        return [
            'user' => $user->toArray(),
            'access_token' => $token,
            'token_type' => 'Bearer'
        ];
    }

    private function findUserByEmail(string $email): ?User
    {
        return $this->model->where('email', $email)->first();
    }
}
