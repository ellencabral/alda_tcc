<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Ellen Cabral',
            'email' => 'ellen@example',
            'email_verified_at' => now(),
            'password' => 123,
        ]);
        $admin = User::create([
            'name' => 'Bruno Cabral',
            'email' => 'bruno@example',
            'email_verified_at' => now(),
            'password' => 123,
        ]);
        $artisan = User::create([
           'name' => 'Celita Morales',
           'email' => 'celita@example',
           'email_verified_at' => now(),
           'password' => 123,
        ]);

        $user->assignRole('user');
        $admin->assignRole('admin');
        $artisan->assignRole('artisan');
    }
}
