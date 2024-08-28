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
        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id');
            //$table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade'); // Optional: Set onDelete behavior;
            $table->string('fa_name');
            $table->string('en_name')->nullable();
            // $table->string('code');
            // $table->integer('post_code');
            // $table->integer('tipax_code');
            // $table->integer('mahex_code');
            // $table->integer('chapar_code');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provinces');
    }
};
