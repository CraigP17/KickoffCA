<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOtherlinksToPodcasts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('podcasts', function (Blueprint $table) {
            $table->dropColumn('other');
            $table->string('other_link')->nullable()->after('spotify');
            $table->string('other_name')->nullable()->after('spotify');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('podcasts', function (Blueprint $table) {
            $table->dropColumn('other_name');
            $table->dropColumn('other_link');
            $table->string('other')->nullable()->after('spotify');
        });
    }
}
