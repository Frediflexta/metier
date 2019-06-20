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

$factory->define(App\Applicant::class, function(Faker\Generator $faker) {
  return [
    'name' => $faker->name,
    'email' => $faker->email,
    'CV' => $faker->sentence(3),
    'job_id' => $faker->numberBetween(1, 7),
    'password' => app('hash')->make('badAss#password')
  ];
});