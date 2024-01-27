<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'description'];

  // Define the relationship between permissions and roles
  public function roles()
  {
    return $this->belongsToMany('App\Role', 'role_permission');
  }
}
