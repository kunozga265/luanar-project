<?php

namespace Database\Seeders;

use App\Models\Donor;
use Illuminate\Database\Seeder;

class DonorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Donor::create([
            'name'  => 'NORAD'
        ]);
        Donor::create([
            'name'  => 'World Bank'
        ]);
        Donor::create([
            'name'  => 'AAP'
        ]);
        Donor::create([
            'name'  => 'CGIAR'
        ]);
        Donor::create([
            'name'  => 'BMEL'
        ]);
        Donor::create([
            'name'  => 'McKnight'
        ]);
    }
}
