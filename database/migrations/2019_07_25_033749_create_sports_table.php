<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('dp_url');
            $table->string('dp_name');
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create('leagues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('parentSport');
            $table->string('dp_url');
            $table->string('dp_name');
            $table->string('slug');
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
        Schema::dropIfExists('leagues');
        Schema::dropIfExists('sports');
    }
}
