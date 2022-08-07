<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'name'  => 'Journal Article'
        ]);
        Type::create([
            'name'  => 'Book Chapter'
        ]);
        Type::create([
            'name'  => 'Proceedings'
        ]);
    }
}
