@extends('layouts.app')
@section('content')
    <div class="container panel panel-body">
        <h1 class="text-center">Evangelio del día</h1>


        <h3 class="text-center">{{$evangelio->titulo}}</h3>

        <div class="jumbotron text-justify">{{$evangelio->texto}}</div>

    </div>
@stop