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
        Schema::create('product', function (Blueprint $table) {
            $table->integer('cod'); // Define el campo que será la clave primaria
            $table->string('name');
            $table->index('name'); 
            $table->string('description');
            $table->index('description'); 
            $table->float('price',8,2);
            $table->index('price'); 
            $table->string('vendor_email');
            $table->string('vendor_name');
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
        Schema::dropIfExists('product');
    }
};
