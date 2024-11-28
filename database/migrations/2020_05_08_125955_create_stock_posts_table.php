<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stock_id')->unsigned();            
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
        Schema::dropIfExists('stock_posts');
    }
}
