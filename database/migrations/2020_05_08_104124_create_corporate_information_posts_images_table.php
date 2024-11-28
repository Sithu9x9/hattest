<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorporateInformationPostsImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporate_information_posts_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('corporate_information_posts_id')->unsigned();            
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
        Schema::dropIfExists('corporate_information_posts_images');
    }
}
