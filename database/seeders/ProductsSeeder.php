<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()
            ->count(40)
            ->create([
                'shop_id' => 1,
            ]);

        Product::factory()
            ->count(32)
            ->create([
                'shop_id' => 2,
            ]);
    }
}
