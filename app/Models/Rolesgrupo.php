<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Rolesgrupo extends Model {

    /**
     * Generated
     */
    use SoftDeletes;
    protected $table = 'rolesgrupos';
    protected $fillable = ['id', 'nombre', 'deleted_at'];
    protected $dates = ['deleted_at'];


    public function gruposusuarios() {
        return $this->hasMany(\App\Models\Gruposusuario::class, 'idRolGrupo', 'id');
    }


}
