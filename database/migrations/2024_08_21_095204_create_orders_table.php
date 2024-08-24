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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id_creator");
            $table->foreignId("user_id_agent");
            $table->foreignId("provider_service_id");
            $table->foreignId("sender_address_id");
            $table->foreignId("recipient_address_id");
            $table->dateTime("register_date");
            $table->enum("order_kind", ["One_sender_one_recipient", "One_sender_many_recipient", "None"])->default("None");
            $table->enum("financial_status", ["1", "2", "None"])->default("None");
            $table->boolean("is_COD")->default(false);
            $table->bigInteger("COD")->nullable();
            $table->enum("payment_type", ["Befor", "After", "None"])->default("None");
            $table->enum("payment_way", ["credit", "online", "cash", "None"])->default("None");
            $table->enum("order_status", ["agent_registered", "suspend", "send_to_driver", "Preparing", "Prepared", "Ready_to_send", "Sent",  "Delived", "Returned", "None"])->default("None");

            $table->string('description');



            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
