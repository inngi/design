<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lottofreq extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lottofreq', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('no')->default(0);
            $table->integer('number1')->default(0);
            $table->integer('number2')->default(0);
            $table->integer('number3')->default(0);
            $table->integer('number4')->default(0);
            $table->integer('number5')->default(0);
            $table->integer('number6')->default(0);
            $table->integer('number7')->default(0);
            $table->integer('number8')->default(0);
            $table->integer('number9')->default(0);
            $table->integer('number10')->default(0);
            $table->integer('number11')->default(0);
            $table->integer('number12')->default(0);
            $table->integer('number13')->default(0);
            $table->integer('number14')->default(0);
            $table->integer('number15')->default(0);
            $table->integer('number16')->default(0);
            $table->integer('number17')->default(0);
            $table->integer('number18')->default(0);
            $table->integer('number19')->default(0);
            $table->integer('number20')->default(0);
            $table->integer('number21')->default(0);
            $table->integer('number22')->default(0);
            $table->integer('number23')->default(0);
            $table->integer('number24')->default(0);
            $table->integer('number25')->default(0);
            $table->integer('number26')->default(0);
            $table->integer('number27')->default(0);
            $table->integer('number28')->default(0);
            $table->integer('number29')->default(0);
            $table->integer('number30')->default(0);
            $table->integer('number31')->default(0);
            $table->integer('number32')->default(0);
            $table->integer('number33')->default(0);
            $table->integer('number34')->default(0);
            $table->integer('number35')->default(0);
            $table->integer('number36')->default(0);
            $table->integer('number37')->default(0);
            $table->integer('number38')->default(0);
            $table->integer('number39')->default(0);
            $table->integer('number40')->default(0);
            $table->integer('number41')->default(0);
            $table->integer('number42')->default(0);
            $table->integer('number43')->default(0);
            $table->integer('number44')->default(0);
            $table->integer('number45')->default(0);
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
        Schema::dropIfExists('lottofreq');

        //
    }
}
