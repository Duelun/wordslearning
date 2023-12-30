<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BaseUser::class,
            countries_setup::class,
            learningphases::class,
            wordclasses::class,
            lang_setup::class,
        ]);
    }
}
