<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Status;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategoriesSeeder::class,
            StatusesSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            UsersSeeder::class,
            ShopsSeeder::class,
            ProductsSeeder::class,
            ShippingAddressesSeeder::class,
        ]);

    }
}
