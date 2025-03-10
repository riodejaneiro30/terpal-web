<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategory::create([
            'product_category_id' => '6726cb42-aad7-4a5e-b880-744982768fd5',
            'product_category_name' => 'Terpal Plastik',
            'created_by' => 'system',
            'created_date' => now(),
        ]);

        ProductCategory::create([
            'product_category_id' => 'b3e33a6c-596b-41e7-be7e-a1bbee1209fd',
            'product_category_name' => 'Terpal Karet',
            'created_by' => 'system',
            'created_date' => now(),
        ]);

        ProductCategory::create([
            'product_category_id' => 'c6f0bddc-8a82-427b-b83b-421e9741be67',
            'product_category_name' => 'Terpal Kain (Canvas)',
            'created_by' => 'system',
            'created_date' => now(),
        ]);
    }
}
