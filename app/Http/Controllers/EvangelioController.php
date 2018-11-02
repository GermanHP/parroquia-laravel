<?php

namespace App\Http\Controllers;

use App\Http\Requests\EvangelioRequest;
use App\Models\Evangelio;
use Auth;
use Illuminate\Http\Request;

class EvangelioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evangelio = Evangelio::orderBy('id','DESC')->first();

        return view('evangelio.evangeliodeldia',compact('evangelio'));
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
    public function store(EvangelioRequest $request)
    {
        $evangelio = new Evangelio();

        $evangelio->fill([
            'titulo'=>$request['tituloEvangelio'],
            'texto'=>$request['cuerpoEvangelio'],
            'idUsuario'=>Auth::user()->id,
        ]);

        $evangelio->save();

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
