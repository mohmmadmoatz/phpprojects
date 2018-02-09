<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatVistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pat_vists', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('pat_id');
            $table->longText('invoice_items');
            $table->string('Total');
            $table->string('net_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pat_vists');
    }
}
