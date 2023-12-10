<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * create br eng mohamed Adel Elfeky 
 * email : mohamedelfeky1995@gmail.com 
 * phone : +201010152694
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('customer_name');
            $table->integer('city_id');
            $table->string('district');
            $table->string('address');
            $table->string('postal_code');
            $table->string('email');
            $table->string('phone_number');
            $table->string('extra_phone_number')->nullable();
            $table->integer('floor_no')->nullable();
            $table->integer('order_total');
            $table->integer('total_profits');
            $table->longText('cart_data');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
