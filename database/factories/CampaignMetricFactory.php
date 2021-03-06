<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CampaignMetric;
use Faker\Generator as Faker;

$factory->define(CampaignMetric::class, function (Faker $faker) {
    return [
        'date'=>$faker->dateTimeBetween('now', '+30 days'),
		'click'=>$faker->numberBetween(0,100),
		'views'=>$faker->numberBetween(0,100),
		'spent'=>$faker->numberBetween(0,100),
    ];
});
