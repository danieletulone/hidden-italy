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
				'lat' => $faker->latitude,
				'lon' => $faker->longitude,
				'user_id' => $faker->numberBetween(1, User::orderBy('id', 'DESC')->first()->id),
				'image_id' => $faker->numberBetween(1, Image::orderBy('id', 'DESC')->first()->id),
    ];
});
