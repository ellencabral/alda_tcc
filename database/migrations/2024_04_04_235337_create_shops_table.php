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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('url', 50)->unique();
            $table->string('name', 150);
            $table->text('description')->nullable();
            $table->string('cpf', 11)->unique()->nullable();
            $table->string('cnpj', 14)->unique()->nullable();
            $table->binary('image')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->boolean('is_active')->default(false);

            $table->string('street', 150)->nullable();
            $table->string('number', 20)->nullable();
            $table->string('complement', 150)->nullable();
            $table->string('locality', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->char('region_code', 2)->nullable();
            $table->string('postal_code', 9)->nullable();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
