<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Gruposusuario extends Model {

    /**
     * Generated
     */
    use SoftDeletes;
    protected $table = 'gruposusuarios';
    protected $fillable = ['id', 'idUsuario', 'idGrupo', 'idRolGrupo', 'deleted_at'];
    protected $dates = ['deleted_at'];


    public function grupo() {
        return $this->belongsTo(\App\Models\Grupo::class, 'idGrupo', 'id');
    }

    public function rolesgrupo() {
        return $this->belongsTo(\App\Models\Rolesgrupo::class, 'idRolGrupo', 'id');
    }

    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'idUsuario', 'id');
    }

    public function actividadesusuarios() {
        return $this->hasMany(\App\Models\Actividadesusuario::class, 'idGrupoUsuario', 'id');
    }


}
