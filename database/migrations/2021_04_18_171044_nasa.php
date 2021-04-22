<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Nasa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nasa', function(Blueprint $table){
            $table->increments('id');
            $table->text('copyRight')->nullable();
            $table->text('date');
            $table->text('explanation');
            $table->text('url');
            $table->text('title');
            $table->text('hdurl')->nullable();
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
        Schema::dropIfExists('nasa');

        //
    }
}
