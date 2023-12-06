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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('city_id')->nullable()->comment('anther system');
            $table->string('name')->nullable();
            $table->decimal('deleg', 8, 3)->nullable()->comment('هو قيمة الشحن');
            $table->decimal('com', 8, 3)->nullable()->comment('هو حصة الشركة من قيمة الشحن');
            $table->decimal('del', 8, 3)->nullable()->comment('هو حصة المندوب من قيمة الشحن');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
