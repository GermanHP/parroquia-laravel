@extends('layouts.app')
@section('content')

    <div class="container jumbotron">


            <h3 class="text-center">{{$novedad->nombre}}</h3>

            <div class="text-justify">
                <?php echo $novedad->descripcion; ?>
                <hr class="divider">
            </div>

    </div>
@stop