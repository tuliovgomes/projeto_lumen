<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ContactsSeeder;
use Database\Seeders\PersonalCollectionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ContactsSeeder::class,
            PersonalCollectionSeeder::class,
        ]);
    }
}
