<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::count()) {
            User::create([
                'email'    => 'teste@teste.com.br',
                'name'     => 'Teste',
                'password' => Hash::make('123456'),
            ]);

            $this->command->info("Email:teste@teste.com.br, Password:123456");
        }
    }
}
