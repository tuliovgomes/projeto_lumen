<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

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
                'password' => Crypt::encrypt('123456'),
            ]);
        }
    }
}
