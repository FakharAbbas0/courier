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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->integer('branch_id')->default(1);
            $table->string('name',255)->nullable();
            $table->string('client_code',50)->nullable();
            $table->text('password')->nullable();
            $table->string('phone',255)->nullable();
            $table->string('email',255)->nullable();
            $table->decimal('sale_tax', 10 , 2)->default(0.00);
            $table->decimal('fuel_surcharge', 10 , 2)->default(0.00);
            $table->integer('city_id')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
