<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::create([
            "avatar"=> "images/avatar.png",
            "firstName"=> "Jens",
            "middleName"=> "B",
            "lastName"=> "Aune",
            "biography"=> null,
        ]);
          Author::create([
            "avatar"=> "images/avatar.png",
            "firstName"=> "Thabbie",
            "middleName"=> null,
            "lastName"=> "Chilongo",
            "biography"=> null,
          ]);
          Author::create([
            "avatar"=> "images/avatar.png",
            "firstName"=> "Trust",
            "middleName"=> "Kasambala",
            "lastName"=> "Donga",
            "biography"=> null,
          ]);
          Author::create([
            "avatar"=> "images/avatar.png",
            "firstName"=> "Ole",
            "middleName"=> "Martin",
            "lastName"=> "Eklo",
            "biography"=> null,
          ]);
          Author::create([
            "avatar"=> "images/avatar.png",
            "firstName"=> "Musandji",
            "middleName"=> null,
            "lastName"=> "Fuamba",
            "biography"=> null,
          ]);
          Author::create([
            "avatar"=> "files/avatars/gerosomo.jpg",
            "firstName"=> "Numeri",
            "middleName"=> "C.",
            "lastName"=> "Geresomo",
            "biography"=> null,
          ]);
          Author::create([
            "avatar"=> "images/avatar.png",
            "firstName"=> "Heinz",
            "middleName"=> "Erasmus",
            "lastName"=> "Jacobs",
            "biography"=> null,
          ]);
          Author::create([
            "avatar"=> "images/avatar.png",
            "firstName"=> "Experencia",
            "middleName"=> "Madalitso",
            "lastName"=> "Jalasi",
            "biography"=> null,
          ]);
          Author::create([
            "avatar"=> "images/avatar.png",
            "firstName"=> "Vernom",
            "middleName"=> "H",
            "lastName"=> "Kabambe",
            "biography"=> null,
          ]);
          Author::create([
            "avatar"=> "images/avatar.png",
            "firstName"=> "Chikondi",
            "middleName"=> null,
            "lastName"=> "Makwiza",
            "biography"=> null,
          ]);
          Author::create([
            "avatar"=> "images/avatar.png",
            "firstName"=> "Joseph",
            "middleName"=> "W.",
            "lastName"=> "Matofari",
            "biography"=> null,
          ]);
          Author::create([
            "avatar"=> "images/avatar.png",
            "firstName"=> "Elizabeth",
            "middleName"=> "Kamau",
            "lastName"=> "Mbuthia",
            "biography"=> null,
          ]);
          Author::create([
            "avatar"=> "images/avatar.png",
            "firstName"=> "Agnes",
            "middleName"=> "M.",
            "lastName"=> "Mwangwela",
            "biography"=> null,
          ]);
          Author::create([
            "avatar"=> "images/avatar.png",
            "firstName"=> "Amos",
            "middleName"=> "R",
            "lastName"=> "Ngwira",
            "biography"=> null,
          ]);
          Author::create([
            "avatar"=> "images/avatar.png",
            "firstName"=> "Friday",
            "middleName"=> null,
            "lastName"=> "Njaya",
            "biography"=> null,
          ]);
          Author::create([
            "avatar"=> "images/avatar.png",
            "firstName"=> "Bishal",
            "middleName"=> "Kumar",
            "lastName"=> "Sitaula",
            "biography"=> null,
          ]);
          Author::create([
            "avatar"=> "images/avatar.png",
            "firstName"=> "G",
            "middleName"=> null,
            "lastName"=> "Synnevag",
            "biography"=> null,
          ]);
          Author::create([
              "avatar"=> "files/avatars/limuwa.jpg",
            "firstName"=> "Moses",
            "middleName"=> "Majid",
            "lastName"=> "Limuwa",
            "biography"=> null,
          ]);
    }
}
