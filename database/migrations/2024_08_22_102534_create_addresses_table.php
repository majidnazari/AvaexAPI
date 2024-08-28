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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->unsignedInteger('country_id');
            // $table->unsignedInteger('province_id');
            $table->foreignId('city_id');
            //$table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            //$table->unsignedInteger('area_id');
            $table->string('title')->nullable();
            $table->string('postal_code');
            $table->string('blv_name')->nullable();
            $table->string('street_name')->nullable();
            $table->string('building_no')->nullable(); // شماره پلاک ساختمان
            $table->string('floor')->nullable(); // ["Ground", "1", "2", "3", "4", "5", "6", "7", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "20+", "Other"])->default("Other");
            $table->string('unit_number')->nullable(); //, ["1", "2", "3", "4", "5", "6", "7", "10", "10+", "Other"])->default("Other");
            $table->string('unit_no')->nullable(); // شماره واحد
            $table->boolean('is_sender')->default(false);
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('description')->nullable();



            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
