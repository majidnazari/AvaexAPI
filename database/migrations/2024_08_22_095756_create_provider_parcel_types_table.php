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
        Schema::create('provider_parcel_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId("provider_id"); //which provider like tipax or post or mahex 
            $table->string("provider_name"); //which provider like tipax or post or mahex 
            $table->integer("code"); // like 5 is id fpr closed in package type
            $table->enum("parcel_type", ["Packet", "Closed", "Gunny"]);
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
        Schema::dropIfExists('provider_parcel_types');
    }
};
