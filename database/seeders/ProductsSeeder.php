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
        Product::create([
            'image' => 'product-image.png',
            'name' => 'Ursinha Amigurumi',
            'description' => 'Produto feito com linha 100% algodão e fibra siliconada antialérgica
Tamanho aproximado: 20cm (sentadinha) 25cm (em pé)
Cores e detalhes podem ser alterados',
            'sale_price' => 80,
            'deadline' => 30,
            'shop_id' => 1,
            'category_id' => 1,
        ]);
        Product::create([
            'image' => 'product-image.png',
            'name' => 'Vaquinha Amigurumi',
            'description' => 'Vaquinha amigurumi feita á mão com a técnica amigurumi com fio 100% de algodão, olhos com trava de segurança, enchimento de fibra siliconada, lavável.
Ideal como brinquedo, enfeite de quarto ou de alguma festinha!',
            'sale_price' => 160,
            'deadline' => 15,
            'shop_id' => 1,
            'category_id' => 1,
        ]);
        Product::create([
            'image' => 'product-image.png',
            'name' => 'Naninha Ursinha em Amigurumi',
            'description' => 'Coelhinha feita com a técnica de amigurumi
Linha 100% algodão
Enchimento de fibra siliconada antialérgica
Cores e detalhes podem ser personalizados pelo comprador',
            'sale_price' => 90,
            'deadline' => 30,
            'shop_id' => 1,
            'category_id' => 1,
        ]);
        Product::create([
            'image' => 'product-image.png',
            'name' => 'Boneca Emília amigurumi',
            'sale_price' => 170,
            'deadline' => 30,
            'shop_id' => 2,
            'category_id' => 1,
        ]);
    }
}
