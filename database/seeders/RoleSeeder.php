<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
}
