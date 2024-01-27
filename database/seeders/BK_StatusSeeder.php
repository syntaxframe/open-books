<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BK_StatusSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
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
}
