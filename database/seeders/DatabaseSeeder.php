<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //User ve Quiz Factory Komutları User ve Quiz Seeder Sayfalarına Taşındı.
        $this->call([
            UserSeeder::class,
           QuizSeeder::class,
        ]);


    }
}
