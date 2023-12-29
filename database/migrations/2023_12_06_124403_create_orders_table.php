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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('customer_name')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('extra_phone_number')->nullable()->nullable();
            $table->string('floor_no')->nullable();
            $table->decimal('order_total', 8, 2)->nullable();
            $table->decimal('total_profits', 8, 2)->nullable();
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->unsignedBigInteger('status_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->nullable();
            $table->foreign('status_id')->references('id')->on('statuses')->nullable();

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
