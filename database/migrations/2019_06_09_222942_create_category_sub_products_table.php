<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorySubProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_sub_product', function (Blueprint $table) {
            $table->increments('id');

               $table->integer('category_sub_id')->unsigned()->nullable();
            $table->foreign('category_sub_id')->references('id')->on('category_sub')
                    ->onUpdate('cascade')->onDelete('set null');

            $table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('products')
                    ->onUpdate('cascade')->onDelete('set null');


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
        Schema::dropIfExists('category_sub_product');
    }
}
