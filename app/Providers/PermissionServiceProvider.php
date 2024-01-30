<?php

namespace App\Providers;

use App\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register(): void
  {
      //
  }

  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
    Permission::get()->map(function ($permission)
    {
      Gate::define($permission->name, function ($user) use ($permission)
      {
        return $user->hasPermission($permission);
      });
    });
  }
}
