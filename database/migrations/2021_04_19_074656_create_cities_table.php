<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('code')->unique();
            $table->string('ename');
            $table->timestamps();
        });
        
        Schema::create('confirmed_case', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cityCode')->index();
            $table->string('date');
            $table->integer('numbers');
            $table->timestamps();
            $table->foreign('cityCode')
            ->references('id')->on('cities')->onDelete('cascade');
            // $table->unique(['cityCode','date']);
        });

        Schema::create('death_case', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cityCode')->index();
            $table->string('date');
            $table->integer('numbers');
            $table->timestamps();
            $table->foreign('cityCode')
            ->references('id')->on('cities')->onDelete('cascade');
            // $table->unique(['cityCode','date']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
