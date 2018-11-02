<?php

use Illuminate\Database\Seeder;

class SeederUsuarioAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     *
     *  Schema::create('users', function (Blueprint $table)
     */
    public function run()
    {
        DB::table('users')->insert(array(
            'nombre'=>'Alexander Leonardo',
            'apellido'=>'Dominguez Pascacio',
            'fechaDeNacimiento'=>'14/07/1994',
            'genero'=>'0',
            'resetPassword'=>'0',
            'email'=>'todociber100@gmail.com',
            'password'=>bcrypt('todociber'),
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));
        DB::table('rolessistemausuario')->insert(array(
            'idRolSistema'=>'1',
            'idUsuario'=>'1',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));

    }
}
