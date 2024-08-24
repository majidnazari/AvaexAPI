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
        Schema::create('provider_payment_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId("provider_id"); //which provider like tipax or post or mahex 
            $table->string("provider_name"); //which provider like tipax or post or mahex 
            $table->integer("code");
            $table->enum(
                "payment_type",
                [
                    "Sender_cash", "Sender_credit", "Sender_wallet", "Recipient_delevered",
                    "Recipient_location", "Online", "Online_credit", "Prepaid", "Collect_on_delivery","Freight_collect", "None"
                ]
            )->default("None");
            $table->enum("payment_status", ["Active", "Inactive"]);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provider_pament_types');
    }
};
