<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Rolessistemausuario extends Model {

    /**
     * Generated
     */
    use SoftDeletes;
    protected $table = 'rolessistemausuario';
    protected $fillable = ['id', 'idRolSistema', 'idUsuario', 'deleted_at'];
    protected $dates = ['deleted_at'];


    public function rolessistema() {
        return $this->belongsTo(\App\Models\Rolessistema::class, 'idRolSistema', 'id');
    }

    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'idUsuario', 'id');
    }


}
