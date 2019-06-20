<?php

namespace App;

use illuminate\Database\Eloquent\Model;

class Job extends Model
{
  protected $primaryKey = 'id';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'title', 'description', 'skill_required', 'employer_id'
  ];

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = ['created_at', 'updated_at'];


  /**
   * Relationship: Author
   *
   * @return Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function employer()
  {
    return $this->belongsTo('App\Employer');
  }
}