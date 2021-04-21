<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factories\Factory $factory */

use App\Models\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {

    $gender = $faker->randomElement(['male', 'female']);
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'address' => $faker->address,
        'city' => $faker->city,
        'salutation' => $gender,
        'social_security_number' => $faker->creditCardNumber,
        'account_balance' => $faker->numberBetween(1, 100),
    ];
});
