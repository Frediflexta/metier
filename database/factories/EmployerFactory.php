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

$factory->define(App\Employer::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->name,
    'email' => $faker->companyEmail,
    'company' => $faker->company,
    'position' => $faker->randomElement(['hr_manager', 'ceo']),
    'password' => app('hash')->make('badAss#password')
  ];
});