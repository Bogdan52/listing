<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Campaign;
use Faker\Generator as Faker;

$factory->define(Campaign::class, function (Faker $faker) {
    return [
        'name' =>$faker->name,
		'state'=>$faker->randomElement(array('draft', 'active', 'inactive')),
		'buget'=>$faker->numberBetween(1000,100000),
		'start_date'=>$faker->dateTimeBetween('now', '+30 days'),
		'end_date'=>$faker->dateTimeBetween('+30 days','+60 days'),
    ];
});
