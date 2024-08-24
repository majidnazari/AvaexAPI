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
        Schema::create('provider_package_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId("provider_id"); //which provider like tipax or post or mahex 
            $table->string("provider_name"); //which provider like tipax or post or mahex 
            $table->integer("code"); // like 10 is id fpr closed in package type
            $table->enum("package_type", ["Packet", "Closed"]);
            $table->enum("package_status", ["Active", "Inactive"]);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provider_package_types');
    }
};
