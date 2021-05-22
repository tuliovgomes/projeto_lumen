<?php

namespace Database\Seeders;

use App\Models\PersonalCollection;
use Illuminate\Database\Seeder;

class PersonalCollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!PersonalCollection::count()) {
            PersonalCollection::factory()->count(30)->create();

            $this->command->info("add collections");
        }
    }
}
