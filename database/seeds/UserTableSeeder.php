<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'       => 'Denis dos Reis Santos',
            'email'      => 'denis380@gmail.com',
            'password'   => bcrypt('Fiesta@01'),
            'telefone'   => '31 973037490',
            'estado'     => 'MG',
            'cidade'     => 'Contagem',
            'bairro'     => 'Vila Renascer',
            'logradouro' => 'Adélia Batista',
            'numero'     => '53',
            'tipo'       => 'A'
        ]);
    }
}
