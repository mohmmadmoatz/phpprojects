<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('perid');
            $table->string('hour');
            $table->date('date1');
            $table->string('status');
            $table->string('apptstatus');
            //Other Table Relation
            $table->string('inv_id');
            $table->string('pat_id');
            $table->string('cln_id');
            $table->string('doc_id');
            $table->longText('srvs');
            $table->string('inv_total');
            $table->string('inv_discountnsba');
            $table->string('inv_discountvalue');
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
        Schema::dropIfExists('appts');
    }
}
