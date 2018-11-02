<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Archivo extends Model {

    /**
     * Generated
     */
    use SoftDeletes;
    protected $table = 'archivos';
    protected $fillable = ['id', 'titulo', 'descripcion', 'nombreArchivo', 'urlArchivo', 'numeroDescargas', 'deleted_at'];
    protected $dates = ['deleted_at'];



}
