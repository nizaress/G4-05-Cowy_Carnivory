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
        Schema::create('lineorder', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('order_id')->nullable();
            $table->integer('numOrder');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->integer('product_code');
            $table->string('product_name');
            $table->string('product_description');
            $table->float('product_price',8,2);
            $table->unique(['id','numOrder']);
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
        Schema::dropIfExists('lineorder');
    }
};
