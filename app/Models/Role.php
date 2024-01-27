<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  use HasFactory;
  protected $fillable = [
    'name',
    'key',
    'description'
  ];

  // Define the relationship between roles and users
  public function users()
  {
    return $this->belongsToMany('App\User', 'roles');
  }

  // Define the relationship between roles and permissions
  public function permissions()
  {
    return $this->belongsToMany('App\Permission', 'role_permission');
  }
}
