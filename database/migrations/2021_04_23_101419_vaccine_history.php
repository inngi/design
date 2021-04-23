<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VaccineHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccine_history', function(Blueprint $table){
            $table->increments('id');
            $table->text('date');
            $table->string('firstCnt');
            $table->string('secondCnt');
            $table->string('totalFirstCnt');
            $table->string('totalSecondCnt');
            $table->string('sido');
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('vaccine_history');
    }
}
