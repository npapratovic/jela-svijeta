<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5a4287c233ec2RelationshipsToIngredientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ingredients', function(Blueprint $table) {
            if (!Schema::hasColumn('ingredients', 'language_id')) {
                $table->integer('language_id')->unsigned()->nullable();
                $table->foreign('language_id', '101264_5a4287c0e6606')->references('id')->on('languages')->onDelete('cascade');
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
        Schema::table('ingredients', function(Blueprint $table) {
            
        });
    }
}
