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
        User::insert([
            'name'=>'Mehmet Parlak',
            'email'=>'mhmttparlak@gmail.com',
            'email_verified_at' => now(),
            'type'=>'admin',
            'password' => '$2b$10$pL4ML77DYChNciipQpAkJ.KujUxqPgQ5McVeFVkx9hAgsRNnYx6W6', // 12345678
            'remember_token' => Str::random(10),
        ]);
         \App\Models\User::factory(5)->create();
        // \App\Models\Quiz::factory(10)->create();

    }
}
