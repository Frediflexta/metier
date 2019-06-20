<?php

namespace App;

use illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
  protected $primaryKey = 'id';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'email', 'CV', 'job_id', 'password'
  ];


  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = ['password', 'created_at', 'updated_at'];
}