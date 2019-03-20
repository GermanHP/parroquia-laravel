<?php


namespace App\Utilities;

use App\Models\Cliente;
use App\Models\Ordene;
use Asachanfbd\LaravelPushNotification\PushNotification;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Hash;
use Snowfire\Beautymail\Beautymail;

class Action
{

    public function makePassword()   {
        $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //posibles caracteres a usar
        $numerodeletras = 8; //numero de letras para generar el texto
        $cadena = ""; //variable para almacenar la cadena generada
        for ($i = 0; $i < $numerodeletras; $i++) {
            $cadena .= substr($caracteres, rand(0, strlen($caracteres)), 1);
        }
        return $cadena;
    }

    public function generarEmail($nombres, $apellidos){
        $carnet = 'HP100114';
        $caracteres = "1234567890"; //posibles caracteres a usar
        $numerodeletras = 6; //numero de letras para generar el texto
        $cadena = ""; //variable para almacenar la cadena generada
        for ($i = 0; $i < $numerodeletras; $i++) {
            $cadena .= substr($caracteres, rand(0, strlen($caracteres)), 1);
        }
        $carnet = substr($nombres,0,1).substr($apellidos,0,1).$cadena."@iglesiaolocuilta.com";
        return $carnet;
    }

    public function killSession($idUser)
    {
        DB::table("sessions")->where("user_id", $idUser)
            ->delete();
    }

    public function killAllSessionsHouse($users)
    {

        DB::table("sessions")->whereIn("user_id", $users)->delete();
    }




}
