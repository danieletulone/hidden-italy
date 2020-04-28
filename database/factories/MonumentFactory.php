<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Monument;
use App\Models\User;
use App\Models\Image;
use Faker\Generator as Faker;

$factory->define(Monument::class, function (Faker $faker) {
	    return [
        'name' => $faker->city,
				'description' => $faker->text($maxNbChars = 200),
				'lat' => $faker->latitude($min = -90, $max = 90),
				'lon' => $faker->longitude($min = -180, $max = 180),
				'user_id' => $faker->numberBetween(1, User::orderBy('id', 'DESC')->first()->id),
    ];
});
