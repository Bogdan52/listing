<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CampaignMetric;
use Faker\Generator as Faker;

$factory->define(CampaignMetric::class, function (Faker $faker) {
    return [
        'date'=>$faker->dateTimeBetween('-30 days', 'now'),
		'click'=>$faker->numberBetween(0,1000),
		'views'=>$faker->numberBetween(0,1000),
		'spent'=>$faker->numberBetween(0,1000),
    ];
});
