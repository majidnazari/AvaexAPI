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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->string('registered_number');
            $table->string('tracking_code');
            $table->string('refrence_code');

            $table->integer('insurance_provider_cost');
            $table->integer('tax_provider_cost');
            $table->integer('fee_provider_cost');
            $table->integer('unusual_provider_cost');
            $table->integer('extra_provider_cost');


            $table->integer('insurance_service_cost');
            $table->integer('fee_service_cost');
            $table->integer('tax_service_cost');
            $table->integer('collecting_service_cost');
            $table->integer('inplace_service_cost');
            $table->integer('fee_service_VIP');
            $table->integer('SMS_service_cost');
            $table->integer('print_service_cost');
            $table->integer('extra_service_cost');
            $table->integer('manager_commission');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
