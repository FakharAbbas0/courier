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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); 
            $table->string('tracking_no',255)->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('service_id')->nullable();
            $table->integer('branch_id')->default(1);
            $table->integer('origin')->default(1);
            $table->integer('destination')->default(1);
            $table->decimal('cod_amount',10,2)->default(0.00);
            $table->decimal('delivery_charges',10,2)->default(0.00);
            $table->decimal('fuel_surcharge',10,2)->default(0.00);
            $table->decimal('sale_tax',10,2)->default(0.00); 
            $table->decimal('net_amount',10,2)->default(0.00);  
            $table->timestamp('order_date')->nullable();
            $table->integer('status')->default(1);
            $table->string('payment_status',50)->default('pending');
            $table->enum('is_paid',[0,1])->default(0);
            $table->integer('payment_id')->nullable();
            $table->integer('pickup_sheet_id')->nullable();
            $table->integer('delivery_sheet_id')->nullable();
            $table->integer('pickup_rider_id')->nullable();
            $table->integer('delivery_rider_id')->default(0);
            $table->enum('is_picked_up_by_rider',[0,1])->default(0);
            $table->enum('is_delivered_by_rider',[0,1])->default(0);
            $table->enum('is_returned',[0,1])->default(0);
            $table->integer('return_rider_id')->nullable();
            $table->json('extra_info')->nullable();

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
