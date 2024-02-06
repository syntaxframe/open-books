<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('languages', function (Blueprint $table) {
      $table->id();
      $table->string('name')->unique();
      $table->longText('description')->nullable();
      $table->timestamps();
    });
    \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'LanguagesSeeder']);

  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('languages');
  }
};
