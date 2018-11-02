<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Telefono extends Model {

    /**
     * Generated
     */
    use SoftDeletes;
    protected $table = 'telefono';
    protected $fillable = ['id', 'numero', 'idTipoTelefono', 'idUsuario', 'deleted_at'];
    protected $dates = ['deleted_at'];


    public function tipotelefono() {
        return $this->belongsTo(\App\Models\Tipotelefono::class, 'idTipoTelefono', 'id');
    }

    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'idUsuario', 'id');
    }


}
