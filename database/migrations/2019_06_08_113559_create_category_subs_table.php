<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorySubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_subs', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')
                    ->on('category')->onDelete('cascade');  
            
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
        Schema::dropIfExists('category_subs');
    }
}
