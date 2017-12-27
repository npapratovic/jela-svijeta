<?php

use Illuminate\Database\Seeder;



class LanguageSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 

        $items = [
            
            ['title' => 'Engleski jezik', 'slug' => 'engleski-jezik', 'iso_label' => 'en',],
            ['title' => 'Hrvatski jezik', 'slug' => 'hrvatski-jezik', 'iso_label' => 'hr',],
            ['title' => 'Njemački jezik', 'slug' => 'njemacki-jezik', 'iso_label' => 'de',], 

        ];

        foreach ($items as $item) {
            \App\Language::create($item);
        }
    }
}
