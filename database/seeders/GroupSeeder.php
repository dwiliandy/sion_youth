<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=1; $i <= 30; $i++) {
        $groups[] = [
          'name' => $i
        ];
      }
        
        DB::table('groups')->insert($groups);
    }
}
