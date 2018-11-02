<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Rolessistema extends Model {

    /**
     * Generated
     */
    use SoftDeletes;
    protected $table = 'rolessistema';
    protected $fillable = ['id', 'nombre', 'deleted_at'];
    protected $dates = ['deleted_at'];


    public function users() {
        return $this->belongsToMany(\App\Models\User::class, 'rolessistemausuario', 'idRolSistema', 'idUsuario');
    }

    public function rolessistemausuarios() {
        return $this->hasMany(\App\Models\Rolessistemausuario::class, 'idRolSistema', 'id');
    }


}
