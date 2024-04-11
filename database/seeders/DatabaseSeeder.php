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
        $this->call(CategoriesSeeder::class);

        $this->call(StatusesSeeder::class);

        $this->call(UserTypesSeeder::class);

        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);

        //User::factory(4)->create();

        $this->call(UsersSeeder::class);
        $this->call(ShopsSeeder::class);
        $this->call(ProductsSeeder::class);
    }
}
