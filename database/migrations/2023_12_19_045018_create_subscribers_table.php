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
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();
            $table->json('plan')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('plan_id')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->decimal('count_product', 10, 2)->nullable();
            $table->integer('remind_end')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->nullable();
            $table->foreign('plan_id')->references('id')->on('plans')->nullable();
            $table->foreign('payment_id')->references('id')->on('payments')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribers');
    }
};
