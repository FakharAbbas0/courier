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
        Schema::create('slab_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('slab_id')->default(1);
            $table->decimal('weight_from',10, 2)->default(0.00);
            $table->decimal('weight_to',10, 2)->default(0.00);
            $table->decimal('amount',10, 2)->default(0.00); 
            $table->enum('is_last',[0,1])->default(0); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slab_infos');
    }
};
