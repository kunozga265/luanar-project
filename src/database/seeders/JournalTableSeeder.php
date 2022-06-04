<?php

namespace Database\Seeders;

use App\Models\Journal;
use Illuminate\Database\Seeder;

class JournalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Journal::create([
            'title'         =>  "Crop Protection",
            'volume'        =>  null,
        ]);

        Journal::create([
            'title'         =>  "Journal of Nutritional Ecology and Food Research",
            'volume'        =>  4,
        ]);

        Journal::create([
            'title'         =>  "African Journal of Food, Agriculture, Nutrition and Development",
            'volume'        =>  17,
        ]);

        Journal::create([
            'title'         =>  "Ecology of Food and Nutrition",
            'volume'        =>  57,
        ]);

        Journal::create([
            'title'         =>  "African Journal of Agricultural Research",
            'volume'        =>  13,
        ]);
    }
}
