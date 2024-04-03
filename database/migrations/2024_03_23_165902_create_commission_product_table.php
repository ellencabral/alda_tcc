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
        Schema::create('commission_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('commission_id');
            $table->unsignedBiginteger('product_id');

            $table->foreign('commission_id')->references('id')
                ->on('commissions')->onDelete('cascade');
            $table->foreign('product_id')->references('id')
                ->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commission_product');
    }
};
