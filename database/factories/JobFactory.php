<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Job::class, function(Faker\Generator $faker) {
  return [
    'title' => $faker->jobTitle,
    'description' => $faker->sentence(2),
    'skills_required' => $faker->sentence(5),
    'employer_id' => $faker->numberBetween(1,10)
  ];
});