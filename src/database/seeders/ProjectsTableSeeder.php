<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project=Project::create([
            "photo"             => "files/projects/smartex.jpg",
            'name'              => "SMARTEX",
            'description'       => "Collaborative project between Norwegian University of Life Sciences (NMBU) and Lilongwe University of Agriculture and Natural Resources (LUANAR).",
            "duration"          => "2 Years",
            "startDate"         => "2021",
            "endDate"           => "2023",
            "currency"          => "$",
            "budget"            => 3400,
            "author_id"         => 19,
            "donor_id"          => 1,
            "deliverables"      => json_encode([]),
        ]);
        $project->collaborators()->attach([5,7]);

        Project::create([
            "photo"             => "files/projects/ace.jpg",
            'name'              => "ACE II",
            'description'       => "Collaborative project with Governments of Malawi and Mozambique, the World Bank, IUCEA and RUFORUM.",
            "duration"          => "",
            "startDate"         => "",
            "endDate"           => "",
            "currency"          => "$",
            "budget"            => 6000000,
            "author_id"         => 23,
            "donor_id"          => 2,
            "deliverables"      => json_encode([]),
        ]);

        Project::create([
            "photo"             => "files/projects/mwasip.jpg",
            'name'              => "MWASIP",
            'description'       => "Collaborative project of The World Bank, Malawi Government and Lilongwe University of Agriculture and Natural Resources (LUANAR).",
            "duration"          => "5 Years",
            "startDate"         => "2019",
            "endDate"           => "2024",
            "currency"          => "$",
            "budget"            => 157000000,
            "author_id"         => 19,
            "donor_id"          => 2,
            "deliverables"      => json_encode([]),
        ]);

        Project::create([
            "photo"             => "files/projects/foodma.jpg",
            'name'              => "FOODMA",
            'description'       => "Collaborative project with the Norwegian University of Life Sciences (NMBU) through the Sustainable Food Systems in Malawi (FoodMa).",
            "duration"          => "5 Years",
            "startDate"         => "2019",
            "endDate"           => "2024",
            "currency"          => "$",
            "budget"            => 50000000,
            "author_id"         => 18,
            "donor_id"          => 1,
            "deliverables"      => json_encode([]),
        ]);

        Project::create([
            "photo"             => "files/projects/pira.jpg",
            'name'              => "PIRA",
            'description'       => "Collaborative project between Alliance for African Partnership (AAP),Michigan State University and LUANAR.",
            "duration"          => "2 Years",
            "startDate"         => "2021",
            "endDate"           => "2023",
            "currency"          => "$",
            "budget"            => 200000,
            "author_id"         => 19,
            "donor_id"          => 3,
            "deliverables"      => json_encode([]),
        ]);

        Project::create([
            "photo"             => "files/projects/nutrition.jpg",
            'name'              => "Nutrition 4 Health",
            'description'       => "Collaborative project with United States Agency for International Development (USAID), Civil Society Organization Nutrition Alliance (CSONA) and LUANAR.",
            "duration"          => "",
            "startDate"         => "",
            "endDate"           => "",
            "currency"          => "$",
            "budget"            => 15000000,
            "author_id"         => 22,
            "donor_id"          => 1,
            "deliverables"      => json_encode([]),
        ]);

        Project::create([
            "photo"             => "files/projects/cip.jpg",
            'name'              => "CIP",
            'description'       => "Collaborative project with International Potato Center (CIP) and Lilongwe University of Agriculture and Natural Resources.",
            "duration"          => "2 Years",
            "startDate"         => "2021",
            "endDate"           => "2023",
            "currency"          => "$",
            "budget"            => 14000,
            "author_id"         => 19,
            "donor_id"          => 4,
            "deliverables"      => json_encode([]),
        ]);

        Project::create([
            "photo"             => "files/projects/baobab.jpg",
            'name'              => "BAOBAB Project",
            'description'       => "Collaborative project with German Federal Ministry of Food and Agriculture (BMEL), Humboldt University of Berlin, Jomo Kenyatta University of Agriculture and Technology.",
            "duration"          => "2 Years",
            "startDate"         => "2019",
            "endDate"           => "2022",
            "currency"          => "$",
            "budget"            => 14000,
            "author_id"         => 20,
            "donor_id"          => 5,
            "deliverables"      => json_encode([]),
        ]);

        Project::create([
            "photo"             => "files/projects/seed.jpg",
            'name'              => "Seed System Project",
            'description'       => "Collaborative project with McKnight foundation, Michigan State University, Malawi Government and self help Africa. ",
            "duration"          => "2 Years",
            "startDate"         => "2019",
            "endDate"           => "2022",
            "currency"          => "$",
            "budget"            => 345000,
            "author_id"         => 21,
            "donor_id"          => 6,
            "deliverables"      => json_encode([]),
        ]);
    }
}
