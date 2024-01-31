<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'username',
    'email',
    'password',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
  ];

  public function roles()
  {
    return $this->belongsToMany(Role::class, 'role_user');
  }

  public function permissions()
  {
    return $this->belongsToMany(Permission::class);
  }

  public function hasRole($roles)
  {
    foreach($roles as $role)
    {
      if($this->roles->contains("key", $role->key))
      {
        return true;
      }
    }
    return false;
  }

  public function hasPermission($permission)
  {
    return $this->hasPermissionThroughRole($permission) || (bool) $this->permissions->where('name',$permission->name)->count();
  }

  public function hasPermissionThroughRole($permission)
  {
    foreach($permission->roles as $role)
    {
      if($this->roles->contains($role))
      {
        return true;
      }
    }
    return false;
  }
}
