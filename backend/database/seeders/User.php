<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class User extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $newUser = new \App\Models\User;
            $newUser->name = 'Primeiro';
            $newUser->email = 'primeiro@primeiro.com';
            $newUser->email_verified_at = now();
            $newUser->remember_token = Str::random(10);
            $newUser->phone = '11999999999';
            $newUser->adress = 'Rua Teste - Bairro Teste - Estado Teste - Cep Teste';
            $newUser->password = bcrypt( 'senha123' );
            $newUser->save();
    }
}
