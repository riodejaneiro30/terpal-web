<?php

namespace Database\Seeders;

use App\Models\GeneralParameter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GeneralParameter::create([
            'general_parameter_id' => '12fa5cbf-ec0c-4d9c-a0b1-4fa3555ba460',
            'general_parameter_key' => 'COMPANY_PHONE_NUMBER',
            'general_parameter_description' => 'Nomor telepon perusahaan',
            'general_parameter_value' => '0123456789',
            'created_by' => 'system',
            'created_date' => now(),
        ]);

        GeneralParameter::create([
            'general_parameter_id' => '21c16673-b9b3-40ab-bbec-2f8101509612',
            'general_parameter_key' => 'COMPANY_EMAIL',
            'general_parameter_description' => 'Email perusahaan',
            'general_parameter_value' => 'abcde@xyz.com',
            'created_by' => 'system',
            'created_date' => now(),
        ]);

        GeneralParameter::create([
            'general_parameter_id' => 'f41f7178-be96-4b97-80cc-876ef2a910b1',
            'general_parameter_key' => 'COMPANY_DESCRIPTION',
            'general_parameter_description' => 'Deskripsi perusahaan',
            'general_parameter_value' => 'PT. Chaste Gemilang Mandiri merupakan perusahaan yang bergerak di bidang penjualan terpal yang dibutuhkan oleh masyarakat umum ataupun perusahaan-perusahaan bidang lain. Sesuai ijin dagangnya perusahaan ini berlokasi pada kota Surabaya tepatnya pada jalan Mulyosari Prima Utara VI No. 8, 60112. Telah berdiri selama kurang lebih 24 tahun yang mana telah berganti nama sekali.',
            'created_by' => 'system',
            'created_date' => now(),
        ]);

        GeneralParameter::create([
            'general_parameter_id' => 'f6770ae5-4da6-4491-98f3-2358fc02e1f9',
            'general_parameter_key' => 'COMPANY_ADDRESS',
            'general_parameter_description' => 'Alamat perusahaan',
            'general_parameter_value' => 'Jalan Mulyosari Prima Utara VI No. 8, 60112',
            'created_by' => 'system',
            'created_date' => now(),
        ]);
    }
}
