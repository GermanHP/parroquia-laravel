<?php

use Illuminate\Database\Seeder;

class SeederRolesGrupos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rolesgrupos')->insert(array(
            'nombre' => 'Coordinador',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));
        DB::table('rolesgrupos')->insert(array(
            'nombre' => 'Gestor',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));
        DB::table('rolesgrupos')->insert(array(
            'nombre' => 'Miembro',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));
    }
}
