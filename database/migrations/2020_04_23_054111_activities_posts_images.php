<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActivitiesPostsImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities_posts_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('activities_posts_id')->unsigned();            
            $table->binary("image_url");
            $table->string('image_name',191);
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities_posts_images');
    }
}
