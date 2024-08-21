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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('address_id');
            $table->enum('owner_status', ["Owner", "Tenant", "None"])->default("None");

            // $table->unsignedBigInteger('country_id');
            // $table->unsignedBigInteger('province_id');
            // $table->unsignedBigInteger('area_id');
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('shop_id');
            $table->boolean('has_office');
            $table->boolean('ability_to_pay_25');
            $table->boolean('ability_to_give_check');
            $table->boolean('ability_to_insure_employees');
            $table->boolean('ability_to_pay_35_to_equipments');
            $table->enum('military_status', ["Finished", "Exempt", "Conscript", "Desert", "Student", "None"])->default("None");
            $table->enum('marital_status', ["Single", "Married", "Absolute", "Divorced", "None"])->default("None");
            $table->tinyInteger('number_of_children')->nullable();
            $table->enum('gender', ["Male", "Femail", "None"])->default("Male");
            $table->enum('commitment_status', ["1", "2", "None"])->default("None");
            $table->enum('show_status', ["Show", "Hide", "None"])->default("None");
            $table->dateTime('birth_date')->nullable();
            $table->string('referral_code')->nullable();
            $table->string('mobile')->unique();
            $table->string('phone')->unique()->nullable();

            $table->unsignedBigInteger('user_id');
            $table->string('registration_number')->unique()->nullable();
            $table->string('mobile_company')->unique();
            $table->string('phone_company')->unique()->nullable();

            $table->enum('acquaintance_way', ["Friends", "Instagram", "Avaex_website", "None"])->default("None");
            $table->enum('status', ["Active", "Inactive"])->default("Inactive");
            $table->enum('request_status', ["1", "2", "None"])->default("None");

            $table->datetime("contract_termination_request")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
