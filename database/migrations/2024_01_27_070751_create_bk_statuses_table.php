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
        Schema::create('bk_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('key')->unique();
            $table->longText('description')->nullable();
            $table->timestamps();
        });

//        make it w/ seeder
        DB::table('bk_statuses')->insert(
          array(
            [
              'name' => 'draft_01',
              'key' => 'dr_01',
              'description' => '1 lvl draft status',
              'created_at' => DB::raw('NOW()'),
              'updated_at' => DB::raw('NOW()')
            ],
            [
              'name' => 'published_01',
              'key' => 'pb_01',
              'description' => '1 lvl publication status',
              'created_at' => DB::raw('NOW()'),
              'updated_at' => DB::raw('NOW()')
            ],
            [
              'name' => 'published_02',
              'key' => 'pb_02',
              'description' => '2 lvl publication status',
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
        Schema::dropIfExists('bk_statuses');
    }
};
