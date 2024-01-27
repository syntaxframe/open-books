<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB as DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('roles', function (Blueprint $table) {
      $table->id();
      $table->string('name')->unique();
      $table->string('key')->unique();
      $table->longText('description')->nullable();
      $table->timestamps();
    });

    Artisan::call('db:seed', [
      '--class' => \Database\Seeders\RoleSeeder::class,
    ]);
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('roles');
  }
};
