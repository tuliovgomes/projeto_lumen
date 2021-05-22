<?php

namespace Database\Seeders;

use App\Models\Contacts;
use Illuminate\Database\Seeder;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Contacts::count()) {
            Contacts::factory()->count(30)->create();

            $this->command->info("add contacts");
        }
    }
}
