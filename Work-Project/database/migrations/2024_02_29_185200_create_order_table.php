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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->integer('numOrder');
            $table->date('Date');
            $table->time('deliveryTime',0);
            $table->string('PaymentMethod');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->string('customer_email');
            $table->unique(['numOrder','customer_email']);
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
        Schema::dropIfExists('order');
    }
};
