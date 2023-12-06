<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Run the migrations.
 * create br eng mohamed Adel Elfeky 
 * email : mohamedelfeky1995@gmail.com 
 * phone : +201010152694
 */
return new class extends Migration
{

    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_erp')->nullable()->comment('product_erp get by api');
            $table->string('name')->nullable()->comment('name get by api');
            $table->text('description')->nullable();
            $table->decimal('price', 8, 3)->nullable()->comment('price get by api');
            $table->decimal('balance', 8, 3)->nullable()->comment('Balance get by api');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('inactive')->comment('Product status: active or inactive');
            $table->enum('type_rate', ['value', 'present'])->nullable();
            $table->integer('value_rate')->nullable();

            $table->softDeletes();
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
