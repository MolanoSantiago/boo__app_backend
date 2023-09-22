<?php

namespace Database\Seeders;

use App\Models\UserType;
use Hex\Shared\Domain\Constants\UserTypeEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userTypes = [
            [
                'id' => UserTypeEnum::id(UserTypeEnum::SUPER),
                'name' => UserTypeEnum::SUPER,
                'description' => UserTypeEnum::description(UserTypeEnum::SUPER),
                'slug' => UserTypeEnum::slug(UserTypeEnum::SUPER)
            ],
            [
                'id' => UserTypeEnum::id(UserTypeEnum::ADMIN),
                'name' => UserTypeEnum::ADMIN,
                'description' => UserTypeEnum::description(UserTypeEnum::ADMIN),
                'slug' => UserTypeEnum::slug(UserTypeEnum::ADMIN)
            ],
            [
                'id' => UserTypeEnum::id(UserTypeEnum::CUSTOMER),
                'name' => UserTypeEnum::CUSTOMER,
                'description' => UserTypeEnum::description(UserTypeEnum::CUSTOMER),
                'slug' => UserTypeEnum::slug(UserTypeEnum::CUSTOMER)
            ]
        ];

        foreach ($userTypes as $userType) {
            UserType::create($userType);
        }
    }
}
