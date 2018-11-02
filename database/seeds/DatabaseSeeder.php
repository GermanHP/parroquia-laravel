<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(SeederTipoUsuarios::class);
        $this->call(SeederTipoTelefono::class);
        $this->call(SeederTipoActividad::class);
        $this->call(SeederRolesGrupos::class);
        $this->call(SeederUsuarioAdmin::class);

    }
}
