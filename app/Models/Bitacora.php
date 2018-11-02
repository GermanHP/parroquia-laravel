<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Bitacora extends Model {

    /**
     * Generated
     */
    use SoftDeletes;
    protected $table = 'bitacora';
    protected $fillable = ['id', 'idUsuario', 'Acccion', 'Otra Informacion', 'deleted_at'];
    protected $dates = ['deleted_at'];



}
