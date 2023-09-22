<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use App\Models\UserType;
use Hex\Shared\Domain\Constants\PaymentMethodEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paymentMethods = [
            [
                'id' => PaymentMethodEnum::id(PaymentMethodEnum::ONLINE),
                'name' => PaymentMethodEnum::ONLINE,
                'slug' => PaymentMethodEnum::slug(PaymentMethodEnum::ONLINE)
            ],
            [
                'id' => PaymentMethodEnum::id(PaymentMethodEnum::CASH),
                'name' => PaymentMethodEnum::CASH,
                'slug' => PaymentMethodEnum::slug(PaymentMethodEnum::CASH)
            ]
        ];

        foreach ($paymentMethods as $paymentMethod) {
            PaymentMethod::create($paymentMethod);
        }
    }
}
