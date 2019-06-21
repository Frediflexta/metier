<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

use App\Employer;

class EmployersTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Get all Employers with jobs that they posted
     *
     * @return void
     */
    public function testGetEmployersWithAllJobsPosting()
    {
        factory(Employer::class)->create();

        $response = $this->get('/api/v1/employers');
        $response->assertResponseStatus(200);
    }

    /**
     * Get an employer and all jobs that they posted
     *
     * @return void
     */
    public function testGetAnEmployerWithJobsTheyPosted()
    {
        factory(Employer::class)->create();

        $response = $this->get('/api/v1/employers/1/jobs');
        $response->assertResponseStatus(200);
    }

    /**
     *
     *
     * @return void
     */
    public function testEmployerDoesNotExist()
    {
        factory(Employer::class)->create();
        $response = $this->get('/api/v1/employers/10/jobs');
        $response->assertResponseStatus(404);
    }

    /**
     * 
     * @return void
     */
    public function testEmployerInvalidParams()
    {
        factory(Employer::class)->create();

        $response = $this->get('/api/v1/employers/one/jobs');
        $response->assertResponseStatus(400);
    }
}
