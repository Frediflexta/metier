<?php

namespace App;

use illuminate\Database\Eloquent\Model;

class Employer extends Model
{
  protected $primaryKey = 'id';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'email', 'company', 'position', 'password'
  ];

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = ['password', 'created_at', 'updated_at'];

  /**
   * Relationship: Books
   *
   * @return Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function jobs()
  {
    return $this->hasMany('App\Job', 'employer_id', 'id');
  }
}