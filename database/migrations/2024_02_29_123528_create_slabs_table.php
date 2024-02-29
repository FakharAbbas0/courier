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
        Schema::create('slabs', function (Blueprint $table) {
            $table->id();
            $table->integer('branch_id')->default(1);
            $table->string('slab_name',255)->nullable();
            $table->string('slab_type',255)->nullable();
            $table->integer('service_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('division_factor',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slabs');
    }
};
