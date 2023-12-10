<?php
//@noramknarf (Francis Moran) - Everything
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
        Schema::table('baskets', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('product_id')->on('products');

            $table->string('product_name');
            
            $table->decimal('product_price', $precision = 8, $scale = 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('baskets', function (Blueprint $table) {
            $table->dropForeign('baskets_product_id_foreign');
            $table->dropColumn('product_id');

            $table->dropForeign('baskets_user_id_foreign');
            $table->dropColumn('user_id');

            $table->dropColumn('product_name');

            $table->dropcolumn('product_price');
        });
    }
};
