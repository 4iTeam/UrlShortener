<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedirectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redirects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('link_id');
            $table->string('url',4000);
            $table->longText('conditions')->nullable();
            $table->timestamps();
            $table->foreign('link_id')->references('id')->on('links')
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
        Schema::table('redirects',function(Blueprint $table){
            $table->dropForeign(['link_id']);
        });
        Schema::dropIfExists('redirects');
    }
}
