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
            'vehicle_type' => '',
        ]);

        User::create([
            'name' => 'Rick Dawson',
            'email' => 'rick@porto.com',
            'email_verified_at' => now(),
            'password' => bcrypt('batman123'),
            'is_admin' => '0',
            'username' => 'Ricky',
            'vehicle_type' => 'Car',
        ]);

        User::create([
            'name' => 'Steve Grayham',
            'email' => 'steve@porto.com',
            'email_verified_at' => now(),
            'password' => bcrypt('batman123'),
            'is_admin' => '0',
            'username' => 'Steve',
            'vehicle_type' => 'Boat',
        ]);
    }
}
