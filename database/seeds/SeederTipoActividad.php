<?php

use Illuminate\Database\Seeder;

class SeederTipoActividad extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipoactividad')->insert(array(
            'nombre' => 'Publica',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));
        DB::table('tipoactividad')->insert(array(
            'nombre' => 'Privada',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));
        DB::table('tipoactividad')->insert(array(
            'nombre' => 'Especifica',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));
        DB::table('tipoactividad')->insert(array(
            'nombre' => 'General',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));
    }
}
