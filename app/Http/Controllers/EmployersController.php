<?php

namespace App\Http\Controllers;

use App\Employer;

class EmployersController extends Controller
{
  public function index()
  {
    return response()->json(Employer::with('jobs')->get());
  }
}
