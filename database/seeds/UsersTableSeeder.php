<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => encrypt('Administrador'),
            'email' => encrypt('administrador@gusgo.com.br'),
            'password' => bcrypt('teste@00!!'),
            'cpf' => encrypt('111.111.111-11'),
            'telephone' => encrypt('(44) 99838-4793'),
            'situation' => true,
        ]);
    }
}
