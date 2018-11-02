<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestSubirArchivo;
use App\Models\Archivo;
use App\Utilities\GenerarToken;
use Illuminate\Http\Request;
use Storage;

class SubirArhivos extends Controller
{
    public function SubirArchivos(){
        return view('SubirArchivos.SubirArchivos');
    }

    public function GuaradrArchivos(RequestSubirArchivo $request){
        $file = $request->file('Archivo');

        //obtenemos el nombre del archivo
        $token = new GenerarToken();

        $nombre =$token->nombreArchivo().$file->getClientOriginalName();

        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre,  \File::get($file));

        $archivo = new Archivo();
        $archivo->fill([
           "titulo"=>$request['nombre'],
            "descripcion"=>$request['descripcion'],
            "nombreArchivo"=>$nombre,
            "urlArchivo"=>"/storage/",
            "numeroDescargas"=>0
        ]);
        $archivo->save();
        flash('Archivo Guardado','info');
        return redirect()->back();
    }

    public function MostrarArchivos(){
        $archivos = Archivo::all();
        return view('SubirArchivos.MostrarArchivos', compact('archivos'));
    }

    public function DescargarArchivo($id,$archivo){

        $arc = Archivo::find($id);

        if($arc->count()==0){
            abort(404);
        }
        else{
            if($arc->nombreArchivo==$archivo){
                $numeroDeDescargas= $arc->numeroDescargas+1;
                $arc->fill([
                    'numeroDescargas'=>$numeroDeDescargas
                ]);
                $arc->save();
                $public_path = public_path();
                $url = $public_path.'/storage/'.$archivo;
                //verificamos si el archivo existe y lo retornamos
                if (Storage::exists($archivo))
                {
                    return response()->download($url);
                }
            }

        }

        //si no se encuentra lanzamos un error 404.
        abort(404);
    }
    public function EliminarArchivo($id, $nombreArchivo,$created_at){
            $archivo = Archivo::where('id',$id)->where('nombreArchivo',$nombreArchivo)->where('created_at',$created_at)->first();
            if($archivo->count()>0){
                Storage::delete($archivo->nombreArchivo);
                $archivo->delete();
            }

            flash('Archivo Eliminado exitosamente','info');
            return redirect()->back();
    }


}
