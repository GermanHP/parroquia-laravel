@extends('layouts.admin')
@section('content')



    {!!Form::open(['route'=>['Archivos.Guardar'], 'method'=>'POST',"enctype"=>"multipart/form-data", 'onsubmit'=>"waitingDialog.show('Cargando... ',{ progressType: 'info'});setTimeout(function () {waitingDialog.hide();}, 3000);"])!!}
    <div>
        @include('alertas.errores')
        @include('alertas.flash')



        <div class="panel panel-heading container"><h2>Subir Archivos</h2></div>
        <div class="container panel panel-body">
            <div class="input-group form-group">
                {{Form::label('Titulo del Archivo',null,['class'=>'input-group-addon'])}}
                {{Form::text('nombre',null, ['class'=>'form-control','required'=>'true' ,'placeholder'=>'Titulo del Archivo'])}}
            </div>
            <div class="input-group form-group">
                {{Form::label('Descripción del archivo',null,['class'=>'input-group-addon'])}}
                {{Form::text('descripcion',null, ['class'=>'form-control','required'=>'true','placeholder'=>'Breve descripcion del archivo'])}}
            </div>
            <div class="input-group form-group">
                {{Form::label('Subir Archivos',null,['class'=>'input-group-addon'])}}
                <input name="Archivo"  id="Archivo" type="file" accept="*/*" onchange="myFunction()" class="form-control">

            </div>


        {!!Form::submit('Subir Archivos', ['class'=>'btn btn-primary','name'=>'btnActualizarGrupo',"id"=>"btnSubirArchivo","disabled"=>"true"])!!}
        {!!Form::close()!!}



        </div>



    </div>

    <script>
        function myFunction() {
            var file = document.getElementById("Archivo");
            var file_name = file.value;
            var extension = file_name.split('.').pop().toLowerCase();
            var size      = file.files[0].size;
            var allowedFormats = ["jpeg", "jpg", "pdf", "tif","avi","mp4","docx","doc","xlsx","xls","pptx","ppt","png","gif","mp3","wmw"];

            if(!(allowedFormats.indexOf(extension) > -1)){
                alert("Seleccione  un arhivo jpg/jpeg/pdf/tif/avi/mp4/docx/doc/xlsx/xls/pptx/ppt/png/gif/mp3");
                file.value="";
                document.getElementById("btnSubirArchivo").disabled = true;
                return false;
            } else if( ((size/1024)/1024) > 50){
                alert("El Archivo supera los 50MB");
                file.value="";
                document.getElementById("btnSubirArchivo").disabled = true;
                return false;
            } else {
                document.getElementById("btnSubirArchivo").disabled = false;
            }
        }
    </script>
@stop