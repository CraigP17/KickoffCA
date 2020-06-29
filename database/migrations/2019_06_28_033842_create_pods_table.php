<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pods', function (Blueprint $table) {
          $table->engine = 'InnoDB';

          $table->bigIncrements('id');
          $table->string('group_name');
          $table->string('name');
          $table->text('description');
          $table->date('date');
          $table->string('slug');
          $table->timestamps();

          $table->foreign('group_name')->references('name')->on('podcasts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pods');
    }
}
