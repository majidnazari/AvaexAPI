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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('province_id');
            //$table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade'); // Optional: Set onDelete behavior;
            $table->string('fa_name')->nullable();
            $table->string('en_name')->nullable();
            //$table->string('standard_code');
            $table->string('post_code')->nullable();
            $table->string('tipax_code')->nullable();
            $table->string('mahex_code')->nullable();
            $table->string('chapar_code')->nullable();
            $table->string('shop_id')->nullable();

            $table->timestamps();
            $table->softDeletes();
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
