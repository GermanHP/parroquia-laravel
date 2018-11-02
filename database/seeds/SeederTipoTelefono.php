<?php

use Illuminate\Database\Seeder;

class SeederTipoTelefono extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipotelefono')->insert(array(
            'nombre' => 'Casa',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));
        DB::table('tipotelefono')->insert(array(
            'nombre' => 'Celular',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));
        DB::table('tipotelefono')->insert(array(
            'nombre' => 'Trabajo/Oficina',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));
        DB::table('tipotelefono')->insert(array(
            'nombre' => 'Otros',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));
    }
}
