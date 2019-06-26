<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

use App\Job;
use App\Employer;

class JobsTest extends TestCase
{
  use DatabaseMigrations;

  /**
   * Get all jobs
   *
   * @return void
   */
  public function testGetAllJobs()
  {
    factory(Job::class)->create();

    $response = $this->get('/api/v1/jobs');
    $response->assertResponseStatus(200);
  }

  /**
   * Sort jobs based on title/description
   *
   * @return void
   */
  public function testSortingJobs()
  {
    factory(Job::class)->create();

    $response = $this->get('/api/v1/jobs?sort=title_asc');
    $response->assertResponseStatus(200);
  }

  /**
   * Filter jobs by description
   * 
   * @return void
   */
  public function testFilterJobs()
  {
    $jobs = factory(Job::class)->create();

    $response = $this->get("/api/v1/jobs?description={$jobs->description}");
    $response->assertResponseStatus(200);
  }

  /**
   * Search jobs by job title
   * 
   * @return void
   */
  public function testSearchJobs()
  {
    $jobs = factory(Job::class)->create();

    $response = $this->get("/api/v1/jobs?search={$jobs->title}");
    $response->assertResponseStatus(200);
  }

  /**
   * Paginate jobs by limit and offset
   *
   * @return void
   */
  public function testLimitOffsetJobs()
  {
    factory(Job::class, 20)->create();

    $response = $this->get('/api/v1/jobs?limit=5&&offset=5');
    $response->assertResponseStatus(200);
  }

  /**
   * Create a new job
   *
   * @return void
   */
  public function testCreateNewJob()
  {
    $employer = factory(Employer::class)->create();
    $newJob = [
      'title' => 'Testing',
      'description' => 'This describes the test',
      'skills' => 'python, flasjk',
      'employer_id' => $employer->id
    ];

    $response = $this->post('/api/v1/jobs', $newJob);
    $response->assertResponseStatus(201);
  }

  /**
   * Create a new job with an employer that does no exist
   *
   * @return void
   */
  public function testCreateNewJobWithNonExistngEmployer()
  {
    $newJob = [
      'title' => 'Testing',
      'description' => 'This describes the test',
      'skills' => 'python, flasjk',
      'employer_id' => 2
    ];

    $response = $this->post('/api/v1/jobs', $newJob);
    $response->assertResponseStatus(404);
  }
}