<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accesses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('link_id');
            $table->unsignedBigInteger('redirect_id')->nullable();//track which was redirected
            $table->string('ip',100);
            $table->string('agent');
            $table->string('country',7);

            $table->timestamps();

            $table->foreign('link_id')->references('id')->on('links')
                ->onDelete('cascade');
            $table->foreign('redirect_id')->references('id')->on('redirects')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accesses', function (Blueprint $table) {
            $table->dropForeign(['link_id']);
            $table->dropForeign(['redirect_id']);
        });
        Schema::dropIfExists('accesses');
    }
}
