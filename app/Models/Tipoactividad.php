<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Tipoactividad extends Model {

    /**
     * Generated
     */
    use SoftDeletes;
    protected $table = 'tipoactividad';
    protected $fillable = ['id', 'nombre', 'deleted_at'];
    protected $dates = ['deleted_at'];


    public function actividades() {
        return $this->hasMany(\App\Models\Actividade::class, 'idTipoActividad', 'id');
    }


}
