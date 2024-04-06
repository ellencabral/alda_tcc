<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypesSeeder extends Seeder
{
    static $user_types = [
        'user',
        'admin',
        'artisan',
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::$user_types as $user_type) {
            DB::table('user_types')->insert([
                'type' => $user_type
            ]);
        }
    }
}
