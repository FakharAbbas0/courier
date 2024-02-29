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
        Schema::create('slab_origins', function (Blueprint $table) {
            $table->id();
            $table->integer('slab_id')->default(0);
            $table->integer('slab_type')->default(0);
            $table->integer('slab_origin')->default(0);
            $table->integer('slab_destination')->default(0); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slab_origins');
    }
};
