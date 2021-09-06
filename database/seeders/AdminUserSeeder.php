<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('batman123'),
            'is_admin' => '1',
            'username' => 'admin',
        ]);

        User::create([
            'name' => 'batman',
            'email' => 'batman@gotham.com',
            'email_verified_at' => now(),
            'password' => bcrypt('batman123'),
            'is_admin' => '0',
            'username' => 'batman',
        ]);

        User::create([
            'name' => 'superman',
            'email' => 'superman@gotham.com',
            'email_verified_at' => now(),
            'password' => bcrypt('batman123'),
            'is_admin' => '0',
            'username' => 'superman',
        ]);
    }
}
