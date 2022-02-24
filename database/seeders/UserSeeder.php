<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => "Admin",
                'email' => 'admin@admin.com',
                'password' => bcrypt('123')
            ]
        ];
        DB::table('users')->insert($user);
    }
}
