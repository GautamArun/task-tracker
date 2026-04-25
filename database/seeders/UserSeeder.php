<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::updateOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('P@ssWoRd@17182'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'employee@test.com'],
            [
                'name' => 'Employee User',
                'password' => Hash::make('P@sSwoRd@32324'),
                'role' => 'employee',
            ]
        );
    }
}
