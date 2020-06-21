<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use App\Models\Role;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) use ($now, $fromDate) {

    $date = $faker->dateTimeBetween('-100 days', 'now');

    return [
        'firstname'  => $faker->firstName,
        'lastname'   => $faker->lastName,
        'email'      => $faker->freeEmail,
        'created_at' => $date,
        'email_verified_at' => $date,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'role_id' => Role::all()->random()->id,
    ];
});
