[![CircleCI](https://circleci.com/gh/Frediflexta/metier.svg?style=svg)](https://circleci.com/gh/Frediflexta/metier)
[![Maintainability](https://api.codeclimate.com/v1/badges/473c89a6c4424547981c/maintainability)](https://codeclimate.com/github/Frediflexta/metier/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/473c89a6c4424547981c/test_coverage)](https://codeclimate.com/github/Frediflexta/metier/test_coverage)

# metier
A job seeking api, where employers should be able to post jobs and a prospective employee can locate and fill out a job application.

## Dependencies
+ [PHP](https://en.wikipedia.org/wiki/PHP): Please install PHP 7.1+ versions to get the most out of this project.

+ [LUMEN 5.8](https://lumen.laravel.com/docs/5.8): The stunningly fast micro-framework by Laravel.

+ Clone the repository and navigate into the correct directory: `https://github.com/Frediflexta/metier.git && cd metier`

+ Run `composer install`

+ Update `.env` file to configure your ```DATABASE, APP_KEY and JWT_SECRET```, please refer to `.env.example` for references.

## Running the application
+ run `php artisan migrate:fresh --seed` to create and seed the database.

#### DB design
+ [Model Design](https://app.quickdatabasediagrams.com/#/d/7DgkYY)

+ run `php -S localhost:8000 -t public` to start your server.

## Endpoints
| Methods | Endpoints | Params |
|:--------:|:---------:|:--------:|
| GET     | `api/v1/employers`| N/A
| GET     | `api/v1/employers/{id}/jobs`
