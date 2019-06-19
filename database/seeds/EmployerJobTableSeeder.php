<?php

use Illuminate\Database\Seeder;

class EmployerJobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Employer::truncate();

        factory(App\Employer::class, 10)->create()->each(function ($employer) {
            factory(App\Job::class, 8)->create(['employer_id' => $employer->getKey()])->each(function ($job) {
                factory(App\Applicant::class, 3)->create(['job_id' => $job->getKey()]);
            });
        });
    }
}
