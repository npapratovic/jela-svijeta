<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5a428951e792cRelationshipsToMealTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meals', function(Blueprint $table) {
            if (!Schema::hasColumn('meals', 'category_id')) {
                $table->integer('category_id')->unsigned()->nullable();
                $table->foreign('category_id', '101266_5a42895047077')->references('id')->on('categories')->onDelete('cascade');
                }
                if (!Schema::hasColumn('meals', 'language_id')) {
                $table->integer('language_id')->unsigned()->nullable();
                $table->foreign('language_id', '101266_5a4289504f398')->references('id')->on('languages')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meals', function(Blueprint $table) {
            
        });
    }
}
