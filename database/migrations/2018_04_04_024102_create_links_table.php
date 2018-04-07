<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key')->unique()->nullable();
            $table->string('url',4000);
            $table->unsignedBigInteger('clicks')->default(0);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('password')->nullable();//password lock
            $table->string('token')->nullable();//session token to help guess manage their url
            $table->longText('meta')->nullable();//metadata
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')->on('users')
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
        Schema::table('links', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('links');
    }
}
