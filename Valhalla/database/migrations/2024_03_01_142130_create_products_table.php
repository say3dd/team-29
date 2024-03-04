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
            $table->id('product_id'); //changed id to product_id since this syntax has been used throughout the code.
            $table->string('brand');
            $table->string('product_name');
            $table->text('product_description');
            $table->enum('category', ['Laptop', 'Mouse', 'Keyboard', 'Monitor', 'Headset']); //added enum to add catagories
            $table->decimal('price', 8, 2);
            $table->string('images');
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
