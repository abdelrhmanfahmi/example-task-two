<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $admin = User::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '12345678',
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'username' => 'operator',
            'email' => 'operator@gmail.com',
            'password' => '12345678',
        ]);
        $user->assignRole('operator');
    }
}
