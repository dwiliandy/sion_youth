<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
          UserSeeder::class,
          GroupSeeder::class,
          CategorySeeder::class,
        ]);
        
        Permission::create(['name' => 'super admin']);
        User::first()->givePermissionTo('super admin');
    }
}
