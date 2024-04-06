<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    static $categories = [
        'Amigurumi',
        'Aquarela',
        'Arte Digital',
        'Arte em Ferro',
        'Arte em Vidro',
        'Arte Francesa',
        'Barbante',
        'Barroco',
        'Bauer',
        'Bico de Crochê',
        'Biscuit',
        'Bordado',
        'Cabaça',
        'Capitonê',
        'Caricatura',
        'Cartonagem',
        'Cerâmica',
        'Country',
        'Crochê',
        'Customização',
        'Decoupage',
        'Desenho Grafite',
        'Emborrachado',
        'Encadernação',
        'Escultura',
        'EVA',
        'Feltragem',
        'Feltro',
        'Fuxico',
        'Gesso',
        'Ilustração',
        'Jornal',
        'Macramê',
        'Marchetaria',
        'MDF',
        'Miniatura',
        'Mosaico',
        'Óleo sobre Tela',
        'Origami',
        'Papel machê',
        'Papietagem',
        'Patch Aplique',
        'Patchwork',
        'Pintura em Tecido',
        'Pintura em Tela',
        'Ponto Cruz',
        'Ponto Russo',
        'Quilling',
        'Quilt',
        'Renda',
        'Sacro',
        'Scrapbook',
        'Tear',
        'Tecido',
        'Toy Art',
        'Tressê',
        'Tricô',
        'Vagonite',
        'Vitral',
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::$categories as $category) {
            DB::table('categories')->insert([
                'description' => $category
            ]);
        }
    }
}
