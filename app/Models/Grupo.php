<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Grupo extends Model {

    /**
     * Generated
     */
    use SoftDeletes;
    protected $table = 'grupos';
    protected $fillable = ['id', 'nombre', 'descripcion', 'idGrupo', 'deleted_at'];
    protected $dates = ['deleted_at'];



    public function grupo() {
        return $this->belongsTo(\App\Models\Grupo::class, 'idGrupo', 'id');
    }

    public function actividades() {
        return $this->belongsToMany(\App\Models\Actividade::class, 'gruposactividades', 'idGrupo', 'idActividad');
    }

    public function grupos() {
        return $this->hasMany(\App\Models\Grupo::class, 'idGrupo', 'id');
    }

    public function gruposactividades() {
        return $this->hasMany(\App\Models\Gruposactividade::class, 'idGrupo', 'id');
    }

    public function gruposusuarios() {
        return $this->hasMany(\App\Models\Gruposusuario::class, 'idGrupo', 'id');
    }


}
