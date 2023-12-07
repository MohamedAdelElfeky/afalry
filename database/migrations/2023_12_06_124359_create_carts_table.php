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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->integer('count');
            $table->integer('price');
            $table->unsignedBigInteger('order_id')->nullable();

            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->nullable();
            $table->foreign('order_id')->references('id')->on('orders')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
