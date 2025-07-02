<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creamos el usuario admin con password admin
        $usuario = new Usuario();
        $usuario->login = 'admin';
        $usuario->password = bcrypt('admin');
        $usuario->save();
    }
}
