<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'テストユーザ',
            'staff_number' => 1111,
            'department_id' => 1,
            'email' => 'info@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
