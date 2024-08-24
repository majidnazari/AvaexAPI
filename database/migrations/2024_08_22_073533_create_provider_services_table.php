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
        Schema::create('provider_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId("provider_id");
            $table->string("provider_name");
            $table->string("service_name");
            $table->enum("shipping_method", ["By_train", "By_plane", "By_ship", "By_car"]); // like by train or ship or plan 
            $table->enum("status", ["Active", "Inactive", "None"])->default("None");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provider_services');
    }
};
