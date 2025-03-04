<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->insert([
            [
                'menu_id' => 'a14051fa-0e3d-4379-ac30-3d5e62580e6c',
                'menu_name' => 'PRODUCT_VIEW',
                'menu_description' => 'Look up product information',
                'created_by' => 'system',
                'created_date' => now(), // Current timestamp
                'last_updated_by' => null,
                'last_updated_date' => null,
            ],
            [
                'menu_id' => 'e30d3fb6-2f9c-4b87-b96b-a5dc7db02af6',
                'menu_name' => 'PRODUCT_CHANGE',
                'menu_description' => 'Add, edit, or delete products',
                'created_by' => 'system',
                'created_date' => now(), // Current timestamp
                'last_updated_by' => null,
                'last_updated_date' => null,
            ],
            [
                'menu_id' => '5ab42d26-7452-41b4-961f-5a5c0340f054',
                'menu_name' => 'PRODUCT_CATEGORY_FULL_ACCESS',
                'menu_description' => 'Full access to product categories',
                'created_by' => 'system',
                'created_date' => now(), // Current timestamp
                'last_updated_by' => null,
                'last_updated_date' => null,
            ],
            [
                'menu_id' => '9b4e3c3a-8876-4e3c-9575-588887decd05',
                'menu_name' => 'USER_CREATE',
                'menu_description' => 'Add new users in the user management',
                'created_by' => 'system',
                'created_date' => now(), // Current timestamp
                'last_updated_by' => null,
                'last_updated_date' => null,
            ],
            [
                'menu_id' => '0748ea74-00f9-4437-ac56-76c775f2d8dc',
                'menu_name' => 'ROLE_MENU_FULL_ACCESS',
                'menu_description' => 'Full access to role menus',
                'created_by' => 'system',
                'created_date' => now(), // Current timestamp
                'last_updated_by' => null,
                'last_updated_date' => null,
            ],
        ]);
    }
}
