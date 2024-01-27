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

//      Add time when roles created and updated(if it`s not NULL by default)
        DB::table('roles')->insert(
          array(
            [
              'name' => 'admin_01',
              'key' => 'ADM01' ,
              'description' => '1 lvl admin role',
              'created_at' => DB::raw('NOW()'),
              'updated_at' => DB::raw('NOW()')
            ],
            [
              'name' => 'moderator_01',
              'key' => 'MOD01' ,
              'description' => '1 lvl moderator role',
              'created_at' => DB::raw('NOW()'),
              'updated_at' => DB::raw('NOW()')
            ],
            [
              'name' => 'user_01',
              'key' => 'USR01' ,
              'description' => '1 lvl user role',
              'created_at' => DB::raw('NOW()'),
              'updated_at' => DB::raw('NOW()')
            ],
            [
              'name' => 'author_01',
              'key' => 'AUT01' ,
              'description' => '1 lvl author role',
              'created_at' => DB::raw('NOW()'),
              'updated_at' => DB::raw('NOW()')
            ],
          )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
