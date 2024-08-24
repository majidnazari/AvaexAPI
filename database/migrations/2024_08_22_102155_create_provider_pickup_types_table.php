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
        Schema::create('provider_pickup_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId("provider_id"); //which provider like tipax or post or mahex 
            $table->string("provider_name"); //which provider like tipax or post or mahex 
            $table->integer("code");
            $table->enum("pickup_type", ["Customer_location", "Agent_location", "None"])->default("None");
            $table->enum("parcel_status", ["Active", "Inactive"]);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provider_pick_up_types');
    }
};
