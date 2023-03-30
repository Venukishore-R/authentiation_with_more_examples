<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikedislikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likedislikes', function (Blueprint $table) {
            $table->Increments('id')->from(111)->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('video_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');
            $table->boolean('liked')->default(false);
            // $table->boolean('disliked')->default(false);
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
        Schema::table('likedislikes', function(Blueprint $table){
            $table->dropForeign('user_id');
        });
        Schema::table('likedislikes', function(Blueprint $table){
            $table->dropForeign('video_id');
        });
        Schema::dropIfExists('likedislikes');
    }
}
