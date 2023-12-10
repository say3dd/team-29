<?php
//@noramknarf (Francis Moran) - Everything
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * This migration is to create a table to hold user's baskets.
 * 
 * In theory, each basket should link to a user, with users
 * using their ID as a foreign key 
 * (I'm not super well-versed on dbms so might need to revise that)
 * 
 * the idea is that when the User model is created in 
 * RegisteredUserController->store(), a basket will be made for them
 * 
 */

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('baskets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baskets');
    }
};
