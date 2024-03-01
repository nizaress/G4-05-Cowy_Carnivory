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
        Schema::table('lineorder', function (Blueprint $table) {
            $table->foreign('product_code')->references('cod')->on('product')->onDelete('cascade');
            $table->foreign('product_name')->references('name')->on('product')->onDelete('cascade');
            $table->foreign('product_description')->references('description')->on('product')->onDelete('cascade');
            $table->foreign('product_price')->references('price')->on('product')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lineorder', function (Blueprint $table) {
            $table->dropForeign(['product_code']);
            $table->dropForeign(['product_name']);
            $table->dropForeign(['product_description']);
            $table->dropForeign(['product_price']);
        });
    }
};
