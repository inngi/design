<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lotto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('no');
            $table->text('date');
            $table->integer('first');
            $table->integer('second');
            $table->integer('third');
            $table->integer('fourth');
            $table->integer('fifth');
            $table->integer('sixth');
            $table->integer('bonus');
            $table->text('firstAccumamnt');
            $table->text('firstPrzwnerCo');
            $table->text('firstWinamnt');
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
        Schema::dropIfExists('lotto');
        //
    }
}
