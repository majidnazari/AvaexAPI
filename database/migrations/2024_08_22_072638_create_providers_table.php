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
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user_name');
            $table->string('password');
            $table->string('grant_type');
            $table->string('api_key');
            $table->string('base_url');
            $table->string('token_url');
            $table->string('base_token');
            $table->text('access_token');
            $table->text('refresh_token')->nullable();
            $table->datetime('expires_in')->nullable();
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
        Schema::dropIfExists('providers');
    }
};
