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
        Schema::table('product', function (Blueprint $table) {
            $table->foreign('vendor_email')->references('email')->on('vendor')->onDelete('cascade');
            $table->foreign('vendor_name')->references('name')->on('vendor')->onDelete('cascade');
            $table->primary(['cod','vendor_email']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->dropForeign(['vendor_email']);
            $table->dropForeign(['vendor_name']);
        });
    }
};
