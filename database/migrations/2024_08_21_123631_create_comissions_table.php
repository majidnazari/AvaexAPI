<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id_creator');
            $table->foreignId('user_id'); //each agent or manager or user
            $table->foreignId('service_id');
            $table->integer('condition_count')->nullable(); //for example for VIP it should be 520 per month
            $table->enum("comission_type", ["Percent", "Constant", "None"])->default("None");
            $table->float("amount")->default(0);
            $table->enum("status", ["Active", "Inactive"])->default("Inactive");
            $table->enum("priority", ["Low", "Middle", "Hight"])->default("Low");
            $table->datetime("expire_date")->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comissions');
    }
};
