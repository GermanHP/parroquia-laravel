<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Tipotelefono extends Model {

    /**
     * Generated
     */
    use SoftDeletes;
    protected $table = 'tipotelefono';
    protected $fillable = ['id', 'nombre', 'deleted_at'];
    protected $dates = ['deleted_at'];


    public function users() {
        return $this->belongsToMany(\App\Models\User::class, 'telefono', 'idTipoTelefono', 'idUsuario');
    }

    public function telefonos() {
        return $this->hasMany(\App\Models\Telefono::class, 'idTipoTelefono', 'id');
    }


}
