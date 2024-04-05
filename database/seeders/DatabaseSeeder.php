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
        UserType::factory(2)
            ->sequence(
                ['type' => 'user'],
                ['type' => 'admin'],
            )
            ->create();

        User::factory(4)->create();

        Status::factory(6)
            ->sequence(
                ['description' => 'Pedido Efetuado'],
                ['description' => 'Aguardando Pagamento'],
                ['description' => 'Em Preparação'],
                ['description' => 'Pedido Enviado'],
                ['description' => 'Em Transporte'],
                ['description' => 'Pedido Entregue'],
            )
            ->create();
    }
}
