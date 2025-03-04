<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'role_id' => '1417f4a0-8176-4772-a52f-c0c36d2eaad3',
                'role_name' => 'Buyer',
                'role_description' => 'Buyer role with limited access',
                'created_by' => 'system',
                'created_date' => now(), // Current timestamp
                'last_updated_by' => null,
                'last_updated_date' => null,
            ],
            [
                'role_id' => '6b146c7e-50f9-4a1c-b1e9-295436f0b299',
                'role_name' => 'Owner',
                'role_description' => 'Owner role with full access',
                'created_by' => 'system',
                'created_date' => now(), // Current timestamp
                'last_updated_by' => null,
                'last_updated_date' => null,
            ],
            [
                'role_id' => '212b6fc2-6c0d-4613-938c-983dc3eb3108',
                'role_name' => 'Admin staff',
                'role_description' => 'Admin staff role with limited access',
                'created_by' => 'system',
                'created_date' => now(), // Current timestamp
                'last_updated_by' => null,
                'last_updated_date' => null,
            ],
            [
                'role_id' => 'a7c7e6f7-e162-44a8-a8b0-a62ba12d709a',
                'role_name' => 'Warehouse staff',
                'role_description' => 'Warehouse staff role with limited access',
                'created_by' => 'system',
                'created_date' => now(), // Current timestamp
                'last_updated_by' => null,
                'last_updated_date' => null,
            ],
            [
                'role_id' => '01d5cf0c-7bd3-4107-ba54-ac6421ed931f',
                'role_name' => 'Finance staff',
                'role_description' => 'Finance staff role with limited access',
                'created_by' => 'system',
                'created_date' => now(), // Current timestamp
                'last_updated_by' => null,
                'last_updated_date' => null,
            ],
            [
                'role_id' => 'd87f054e-aaee-40cd-9bdf-4b8c1b8864a2',
                'role_name' => 'Shipping staff',
                'role_description' => 'Shipping staff role with limited access',
                'created_by' => 'system',
                'created_date' => now(), // Current timestamp
                'last_updated_by' => null,
                'last_updated_date' => null,
            ],
        ]);
    }
}
