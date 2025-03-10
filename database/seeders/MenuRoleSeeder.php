<?php

namespace Database\Seeders;

use App\Models\MenuRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuRoleSeeder extends Seeder
{
    const OWNER_ROLE_ID = '6b146c7e-50f9-4a1c-b1e9-295436f0b299';
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MenuRole::create([
            'role_id' => self::OWNER_ROLE_ID,
            'menu_id' => 'a14051fa-0e3d-4379-ac30-3d5e62580e6c',
            'created_at' => now()
        ]);

        MenuRole::create([
            'role_id' => self::OWNER_ROLE_ID,
            'menu_id' => 'e30d3fb6-2f9c-4b87-b96b-a5dc7db02af6',
            'created_at' => now()
        ]);

        MenuRole::create([
            'role_id' => self::OWNER_ROLE_ID,
            'menu_id' => '5ab42d26-7452-41b4-961f-5a5c0340f054',
            'created_at' => now()
        ]);
    }
}
