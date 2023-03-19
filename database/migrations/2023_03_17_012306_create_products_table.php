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
            $table->string('name');
            $table->string('slug');
            $table->longText('description')->nullable();
            $table->string('sku');
            $table->foreignId('product_category_id')
                ->nullable()
                ->constrained()
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->foreignId('product_attribute_id')
                ->nullable()
                ->constrained()
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->integer('stock')->default(0);
            $table->decimal('price');
            $table->string('image')->nullable();
            $table->timestamps();
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
