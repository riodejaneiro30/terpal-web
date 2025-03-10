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
                'menu_name' => 'PRODUCT_MANAGEMENT',
                'menu_description' => 'Akses semua menu produk',
                'created_by' => 'system',
                'created_date' => now(), // Current timestamp
                'last_updated_by' => null,
                'last_updated_date' => null,
            ],
            [
                'menu_id' => 'e30d3fb6-2f9c-4b87-b96b-a5dc7db02af6',
                'menu_name' => 'PARAMETER_MANAGEMENT',
                'menu_description' => 'Akses semua menu produk',
                'created_by' => 'system',
                'created_date' => now(), // Current timestamp
                'last_updated_by' => null,
                'last_updated_date' => null,
            ],
            [
                'menu_id' => '5ab42d26-7452-41b4-961f-5a5c0340f054',
                'menu_name' => 'USER_MANAGEMENT',
                'menu_description' => 'Akses semua menu user',
                'created_by' => 'system',
                'created_date' => now(), // Current timestamp
                'last_updated_by' => null,
                'last_updated_date' => null,
            ],
        ]);
    }
}
