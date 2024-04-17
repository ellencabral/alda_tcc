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
        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('street', 160)->nullable();
            $table->string('number', 20)->nullable();
            $table->string('complement', 40)->nullable();
            $table->string('locality', 60)->nullable();
            $table->string('city', 90)->nullable();
            $table->char('region_code', 2)->nullable();
            $table->string('postal_code', 8)->nullable();
            $table->boolean('is_default')->default(true);

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_addresses');
    }
};
