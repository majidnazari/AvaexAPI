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
        Schema::create('user_comissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id_creator');
            $table->foreignId('user_id');
            $table->foreignId('comission_id');
            $table->foreignId('order_id');
            $table->enum("status", ["Applyed", "Not_applyed", "None"])->default("None");

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_comissions');
    }
};
