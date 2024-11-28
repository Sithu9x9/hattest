<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorporateInformationPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporate_information_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('corporate_information_id')->unsigned();            
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
        Schema::dropIfExists('corporate_information_posts');
    }
}
