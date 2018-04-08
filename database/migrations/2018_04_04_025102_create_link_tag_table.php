<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('link_id');
            $table->unsignedInteger('tag_id');
            $table->foreign('link_id')->references('id')->on('links')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('link_tag', function (Blueprint $table) {
            $table->dropForeign(['link_id']);
            $table->dropForeign(['tag_id']);
        });
        Schema::dropIfExists('link_tag');
    }
}
