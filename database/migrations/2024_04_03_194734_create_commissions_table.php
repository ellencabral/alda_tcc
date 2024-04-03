<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commissions', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->decimal('total', 5, 2);
            $table->enum('payment', ['PIX','Cartão de crédito']);
            $table->enum('status', [
                'Pedido Efetuado',
                'Aguardando Pagamento',
                'Em preparação',
                'Pedido Enviado',
                'Em Transporte',
                'Pedido Entregue'
            ]);
            $table->timestamps();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('store_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commissions');
    }
};
