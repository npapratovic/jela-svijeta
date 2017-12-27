<?php

use Illuminate\Database\Seeder;
use Faker\Factory;


class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $items = [
            
            ['title' => 'Hladna predjela', 'slug' => 'hladna-predjela', 'language_id' => '2',],
            ['title' => 'Topla predjela', 'slug' => 'topla-predjela', 'language_id' => '2',],
            ['title' => 'Kruh i peciva', 'slug' => 'kruh-i-peciva', 'language_id' => '2',],
            ['title' => 'Juhe', 'slug' => 'juhe', 'language_id' => '2',],
            ['title' => 'Salate', 'slug' => 'salate', 'language_id' => '2',], 

        ];

        foreach ($items as $item) {
            \App\Category::create($item);
        }


        $faker = Faker\Factory::create();
  

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('categories')->insert([ //,
                'title' => $faker->unique()->sentence,
                'slug' => $faker->unique()->slug,
                'language_id' => $faker->numberBetween($min = 1, $max = 3)
            ]);
        }
 
    }
}
