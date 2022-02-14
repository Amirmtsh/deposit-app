<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("user_id");
            $table->unsignedInteger("amount");
            $table->string('"description"');
            $table->string('"destinationFirstname"');
            $table->string('"destinationLastname"');
            $table->unsignedInteger("destinationNumber");
            $table->unsignedInteger("inquiryDate");
            $table->unsignedInteger("inquirySequence");
            $table->unsignedInteger("inquiryTime");
            $table->string("message");
            $table->unsignedInteger("paymentNumber");
            $table->unsignedInteger("refCode");
            $table->string("sourceFirstname");
            $table->string("sourceLastname");
            $table->string("sourceNumber");
            $table->string("type");
            $table->string("reasonDescription");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
