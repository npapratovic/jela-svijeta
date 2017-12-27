<?php

use Illuminate\Database\Seeder;
use Faker\Factory;


class IngredientSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $items = [
            
            ['title' => 'Krumpir', 'slug' => 'krumpir', 'language_id' => '2',],
            ['title' => 'Riža', 'slug' => 'riza', 'language_id' => '2',],
            ['title' => 'Sol', 'slug' => 'sol', 'language_id' => '2',],
            ['title' => 'Šećer', 'slug' => 'secer', 'language_id' => '2',],
            ['title' => 'Brašno', 'slug' => 'brasno', 'language_id' => '2',], 

        ];

        foreach ($items as $item) {
            \App\Ingredient::create($item);
        }
                
        $faker = Faker\Factory::create();
  

        $limit = 30;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('ingredients')->insert([ //,
                'title' => $faker->unique()->word,
                'slug' => $faker->unique()->slug,
                'language_id' => $faker->numberBetween($min = 1, $max = 3)
            ]);
        }

    }
}
