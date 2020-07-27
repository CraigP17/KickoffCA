<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePodcastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podcasts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('name')->unique()->nullable();
            $table->text('authors');
            $table->text('description');
            $table->string('dp_name')->default('default.png');
            $table->string('dp_url');
            $table->string('sport')->nullable();
            $table->string('apple')->nullable();
            $table->string('spotify')->nullable();
            $table->string('other_name')->nullable();
            $table->string('other_link')->nullable();
            $table->string('slug');
            $table->timestamps();
        });

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

        Schema::create('clips', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->string('group_name');
            $table->string('name');
            $table->string('sport');
            $table->date('date');
            $table->string('duration');
            $table->string('link');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('pods');
        Schema::dropIfExists('clips');
        Schema::dropIfExists('podcasts');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
