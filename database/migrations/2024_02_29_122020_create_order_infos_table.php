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
        Schema::create('order_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->nullable();
            $table->string('tracking_no',255)->nullable();
            $table->string('semail',255)->nullable();
            $table->string('sname',255)->nullable();
            $table->string('sphone',255)->nullable();
            $table->string('rname',255)->nullable();
            $table->string('remail',255)->nullable();
            $table->string('rphone',255)->nullable();
            $table->string('google_sender_address',255)->nullable();
            $table->string('google_receiver_address',255)->nullable();
            $table->string('sender_latitude',255)->nullable();
            $table->string('sender_longitude',255)->nullable();
            $table->string('receiver_latitude',255)->nullable();
            $table->string('receiver_longitude',255)->nullable();
            $table->text('sender_address')->nullable();
            $table->text('receiver_address')->nullable();
            $table->text('description')->nullable();
            $table->text('order_info')->nullable();
            $table->text('comments')->nullable();
            $table->json('extra_order_info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_infos');
    }
};
