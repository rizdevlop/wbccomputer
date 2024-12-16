<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = [
            [
                'username' => 'admin',
                'password' => Hash::make('password123'),
                'phone' => '085799710939',
                'email' => 'admin@example.com',
                'address' => 'Admin Address',
                'status' => 'active',
                'role_id' => 1
            ],
            [
                'username' => 'user1',
                'password' => Hash::make('password'),
                'phone' => '0987654321',
                'email' => 'usr1@example.com',
                'address' => 'User Address 1',
                'status' => 'active',
                'role_id' => 2
            ],
            [
                'username' => 'user2',
                'password' => Hash::make('password'),
                'phone' => '0987654321',
                'email' => 'usr2@example.com',
                'address' => 'User Address 2',
                'status' => 'active',
                'role_id' => 2
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
