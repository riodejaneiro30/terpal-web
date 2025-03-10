<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProductCategorySeeder::class,
            GeneralParameterSeeder::class,
            MenuSeeder::class,
            RoleSeeder::class,
            MenuRoleSeeder::class,
            UserSeeder::class
        ]);
    }
}
