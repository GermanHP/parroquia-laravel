<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Actividade extends Model {

    /**
     * Generated
     */
    use SoftDeletes;
    protected $table = 'actividades';
    protected $fillable = ['id', 'nombre', 'descripcion', 'fechaDeVigencia', 'HoraInicio', 'HoraFin', 'otrosDatosDeInteres', 'idTipoActividad', 'deleted_at'];
    protected $dates = ['deleted_at'];


    public function tipoactividad() {
        return $this->belongsTo(\App\Models\Tipoactividad::class, 'idTipoActividad', 'id');
    }

    public function grupos() {
        return $this->belongsToMany(\App\Models\Grupo::class, 'gruposactividades', 'idActividad', 'idGrupo');
    }

    public function actividadesusuarios() {
        return $this->hasMany(\App\Models\Actividadesusuario::class, 'idActividad', 'id');
    }

    public function gruposactividades() {
        return $this->hasMany(\App\Models\Gruposactividade::class, 'idActividad', 'id');
    }


}
