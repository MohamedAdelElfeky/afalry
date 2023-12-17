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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->decimal('quantity', 8, 2)->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->decimal('discount', 8, 2)->default(0.00);

            $table->foreign('product_id')->references('id')->on('products')->nullable();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
