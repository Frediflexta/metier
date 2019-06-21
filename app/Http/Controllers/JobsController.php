<?php

namespace App\Http\Controllers;

use App\Job;
use App\Employer;
use Illuminate\Http\Request;

class JobsController extends Controller
{
  public function index(Request $request)
  {
    $jobs = Job::with('employer');

    if($request->has('sort')) {
      $values = explode('_', $request->sort);
      $jobs->orderBy($values[0], $values[1]);
    }

    if($request->has('description')) {
      $keyword = strtolower($request->description);
      $jobs->whereRaw('LOWER(description) like (?)', "%{$keyword}%");
    }

    if($request->has('search')) {
      $keyword = strtolower($request->search);
      $jobs->whereRaw('LOWER(title) like (?)', "%{$keyword}%");
    }

    if ($request->has('limit')) {
      $jobs->limit($request->limit);
    }

    if ($request->has('offset')) {
      $jobs->offset($request->offset);
    }

    return response()->json([
      'success' => true,
      'message' => 'successfully retrived jobs',
      'data' => $jobs->get()
    ], 200);
  }
}