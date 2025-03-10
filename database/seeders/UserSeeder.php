<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Owner1',
            'email' => 'owner@example.com',
            'password' => Hash::make('owner1'),
        ]);

        UserProfile::create([
            'user_profile_id' => 'b824c7b3-bfe2-4f9f-b7ae-f4dd0793e648',
            'user_id' => $user->id,
            'gender' => 'Male',
            'phone_number' => '08123456789',
            'date_of_birth' => '1990-01-01',
            'address' => 'Jl. Contoh No.123, Jakarta',
            'role_id' => '6b146c7e-50f9-4a1c-b1e9-295436f0b299'
        ]);
    }
}
