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
            $table->unsignedInteger('user_id');
            // $table->unsignedInteger('country_id');
            // $table->unsignedInteger('province_id');
            $table->unsignedInteger('city_id');
            //$table->unsignedInteger('area_id');
            $table->string('title');
            $table->unsignedInteger('postal_code');
            $table->string('blv_name');
            $table->string('street_name');
            $table->string('building_no'); // شماره پلاک ساختمان
            $table->enum('floor', ["Ground", "1", "2", "3", "4", "5", "6", "7", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "20+", "Other"])->default("Other");
            $table->enum('unit_number', ["1", "2", "3", "4", "5", "6", "7", "10", "10+", "Other"])->default("Other");
            $table->string('unit_no'); // شماره واحد
            $table->boolean('is_sender')->default(false);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mobile');
            $table->string('pnone');
            $table->string('description');



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
