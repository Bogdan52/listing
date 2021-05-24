<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Campaign;
use Faker\Generator as Faker;

$factory->define(Campaign::class, function (Faker $faker) {
    return [
        'name' =>$faker->name,
		'state'=>$faker->randomElement(array('draft', 'active', 'inactive')),
		'buget'=>$faker->numberBetween(1000,100000),
    ];
});
