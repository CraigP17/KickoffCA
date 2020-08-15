<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('articles', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('title')->unique();
          $table->string('description');
          $table->string('author');
          $table->dateTime('date');
          $table->string('sport');
          $table->string('league')->nullable();

          $table->boolean('main_article')->default(false);
          $table->boolean('top_headline')->default(false);
          $table->bigInteger('views')->default(0);

          $table->string('header_img');
          $table->string('header_url');
          $table->string('header_source');

          $table->text('content_1');
          $table->string('image_1')->nullable();
          $table->string('image_1_url')->nullable();
          $table->string('img1_caption')->nullable();

          $table->text('content_2')->nullable();
          $table->string('image_2')->nullable();
          $table->string('image_2_url')->nullable();
          $table->string('img2_caption')->nullable();

          $table->text('content_3')->nullable();
          $table->string('image_3')->nullable();
          $table->string('image_3_url')->nullable();
          $table->string('img3_caption')->nullable();

          $table->text('content_4')->nullable();

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
        Schema::dropIfExists('articles');
    }
}
