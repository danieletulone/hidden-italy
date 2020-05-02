<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Image;
use App\Models\Monument;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
			'title' => $faker->word,
			'description' => $faker->word,
            'url' => '',
            'monument_id' => $faker->numberBetween(1, Monument::orderBy('id', 'DESC')->first()->id),
    ];
});
