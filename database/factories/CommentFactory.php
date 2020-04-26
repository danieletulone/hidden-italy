<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use App\Models\User;
use App\Models\Image;
use App\Models\Monument;

use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
			'content' => $faker->text($maxNbChars = 200),
			'monument_id' => $faker->numberBetween(1, Monument::orderBy('id', 'DESC')->first()->id),
			'user_id' => $faker->numberBetween(1, User::orderBy('id', 'DESC')->first()->id),
			'image_id' => $faker->numberBetween(1, Image::orderBy('id', 'DESC')->first()->id),
    ];
});
