<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5a428951e4a22MealIngredientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('meal_ingredient')) {
            Schema::create('meal_ingredient', function (Blueprint $table) {
                $table->integer('meal_id')->unsigned()->nullable();
                $table->foreign('meal_id', 'fk_p_101266_101263_ingredient_me_5a428951e4bd7')->references('id')->on('meals')->onDelete('cascade');
                $table->integer('ingredient_id')->unsigned()->nullable();
                $table->foreign('ingredient_id', 'fk_p_101263_101266_meal_t_5a428951e4c94')->references('id')->on('ingredients')->onDelete('cascade');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_ingredient');
    }
}
