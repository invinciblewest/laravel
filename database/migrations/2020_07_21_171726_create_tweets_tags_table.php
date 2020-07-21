<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTweetsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweets_tags', function (Blueprint $table) {
            $table->unsignedBigInteger('tweet_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();

            $table->foreign('tweet_id')->on('tweets')->references('id');
            $table->foreign('tag_id')->on('tags')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tweets_tags');
    }
}
