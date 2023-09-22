<?php

namespace Database\Seeders;

use App\Models\User;
use Hex\Shared\Domain\Constants\UserTypeEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Super User',
                'email' => 'super@example.com',
                'password' => Hash::make('super123'),
                'user_type_id' => UserTypeEnum::id(UserTypeEnum::SUPER)
            ],
            [
                'id' => 2,
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin123'),
                'user_type_id' => UserTypeEnum::id(UserTypeEnum::ADMIN)
            ],
            [
                'id' => 3,
                'name' => 'Customer User',
                'email' => 'customer@example.com',
                'password' => Hash::make('customer123'),
                'user_type_id' => UserTypeEnum::id(UserTypeEnum::CUSTOMER)
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
