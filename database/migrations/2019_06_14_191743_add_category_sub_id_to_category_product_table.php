<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategorySubIdToCategoryProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('category_product', function (Blueprint $table) {
            $table->integer('categorySub_id')->unsigned()->nullable();
            $table->foreign('categorySub_id')->references('id')
                    ->on('category_subs')->onDelete('cascade'); 
                    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_product', function (Blueprint $table) {
            
            $table->dropColumn('categorySub_id');

        });
    }
}
