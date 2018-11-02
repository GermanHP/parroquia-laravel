<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Actividadesusuario extends Model {

    /**
     * Generated
     */
    use SoftDeletes;
    protected $table = 'actividadesusuarios';
    protected $fillable = ['id', 'idUsuario', 'idActividad', 'idGrupoUsuario', 'deleted_at'];
    protected $dates = ['deleted_at'];


    public function actividade() {
        return $this->belongsTo(\App\Models\Actividade::class, 'idActividad', 'id');
    }

    public function gruposusuario() {
        return $this->belongsTo(\App\Models\Gruposusuario::class, 'idGrupoUsuario', 'id');
    }

    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'idUsuario', 'id');
    }


}
