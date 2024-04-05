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
        Schema::create('commission_products', function (Blueprint $table) {
            $table->id();
            $table->decimal('sale_price', 5, 2);
            $table->unsignedInteger('quantity');
            $table->decimal('total', 5, 2);

            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('commission_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commission_products');
    }
};
