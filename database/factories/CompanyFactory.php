<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
		'adres'=>$faker->word,
		'cui'=>$faker->unique()->numberBetween(10000,100000),
    ];
});
