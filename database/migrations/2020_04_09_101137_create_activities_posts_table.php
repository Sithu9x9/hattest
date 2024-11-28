<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('activities_id')->unsigned();            
            $table->string('title',191);
            $table->longText('des');
            $table->string("created_by")->nullable();
            $table->string("updated_by")->nullable();            
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
        Schema::dropIfExists('activities_posts');
    }
}
