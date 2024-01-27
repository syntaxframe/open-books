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
    Schema::create('bk_content', function (Blueprint $table) {
      $table->id();
      $table->unsignedInteger('order');
      $table->string('path');
      $table->unsignedBigInteger('book_id');
      $table->foreign('book_id')->references('id')->on('books')->cascadeOnDelete();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('bk_content');
  }
};
