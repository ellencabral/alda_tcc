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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('description', 255);
            $table->text('observation')->nullable();
            $table->binary('image')->nullable()->default('product-image.png');
            $table->decimal('cost_price', 5, 2);
            $table->decimal('sale_price', 5, 2);
            $table->unsignedInteger('stock')->nullable();
            $table->unsignedInteger('deadline')->nullable();
            $table->boolean('is_active')->default(true);

            $table->foreignId('store_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
