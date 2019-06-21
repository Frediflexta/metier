<?php

namespace App\Http\Controllers;

use App\Employer;

class EmployersController extends Controller
{
  /**
   * Returns all the employer
   *
   * @return void
   */
  public function index()
  {
    return response()->json([
      'success' => true,
      'message' => 'Employers were successfully retrieved',
      'data' => Employer::with('jobs')->get(),
    ], 200);
  }

  /**
   * Return an employer and all jobs that they posted
   *
   * @return void
   */
  public function show($id)
  {
    if((int)$id === 0) {
      return response()->json([
        'success' => false,
        'error' => 'invalid parameter'
      ], 400);
    }

    if(!Employer::find($id)) {
      return response()->json([
        'success' => false,
        'error' => 'Employer does not exist'
      ], 404);
    }

    $employer = Employer::with('jobs');
    return response()->json([
      'success' => true,
      'message' => 'Successfully retrieved an employer and their jobs',
      'data' => $employer->find($id)
    ], 200);
  }
}
