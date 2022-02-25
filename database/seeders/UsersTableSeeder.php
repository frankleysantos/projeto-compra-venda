<?php

namespace Database\Seeders;

use App\Models\PerfilUsuario;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Administrador Principal do Sistema',
            'username' => 'admin',
            'password' => Hash::make('12345678'),
        ]);

        // return PerfilUsuario::create([
        //     'user_id' => $user->id,
        //     'status' => 'ativado',
        //     'perfil' => 'veterinario',
        // ]);
        return $user;
    }
}
