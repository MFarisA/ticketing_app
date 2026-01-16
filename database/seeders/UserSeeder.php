<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'adit',
                'email' => 'adit@x.com',
                'password' => 'katasandi',
                'role' => 'mboh'
            ],
            [
                'name' => 'samid',
                'email' => 'samid@x.com',
                'password' => 'katasandi',
                'phone_number' => '09876431'
            ],
            [
                'name' => 'admin',
                'email' => 'admin@x.com',
                'password' => 'katasandi',
                'role' => 'admin',
                'phone_number' => '0987643190'
            ],
        ];

        foreach ($users as $user) {
            $user['password'] = bcrypt($user['password']);
            \App\Models\User::create($user);
        }
    }
}
