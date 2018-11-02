<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestNoticia;
use App\Models\Actividade;
use App\Models\Noticia;
use Auth;
use Illuminate\Http\Request;

class AvisosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::all();
        return view('Admin.Noticias.MostrarNoticia',compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestNoticia $request)
    {
        $aviso = new Noticia();

        $aviso->fill([
           'titulo'=> $request['tituloAviso'],
            'texto'=> $request['cuerpoAviso'],
            'idUsuario'=>Auth::user()->id,
            'fechaDeValides'=>$request['vigenciaAviso']
        ]);

        $aviso->save();

        flash('Aviso publicado exitosamente', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aviso = Noticia::find($id);
        return view('Admin.Noticias.EditarNoticia', compact('aviso'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestNoticia $request, $id)
    {
        $aviso = Noticia::find($id);
        $aviso->fill([
            'titulo'=> $request['tituloAviso'],
            'texto'=> $request['cuerpoAviso'],
            'idUsuario'=>Auth::user()->id,
            'fechaDeValides'=>$request['vigenciaAviso']
        ]);
        $aviso->save();

        flash('Aviso actualizado exitosamente', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aviso = Noticia::find($id);
        $aviso->delete();
        flash('Aviso Eliminado Exitosamente', 'danger');
        return redirect()->back();
    }
}
