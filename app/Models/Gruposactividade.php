<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Gruposactividade extends Model {

    /**
     * Generated
     */
    use SoftDeletes;
    protected $table = 'gruposactividades';
    protected $fillable = ['id', 'idGrupo', 'idActividad', 'deleted_at'];
    protected $dates = ['deleted_at'];


    public function actividade() {
        return $this->belongsTo(\App\Models\Actividade::class, 'idActividad', 'id');
    }

    public function grupo() {
        return $this->belongsTo(\App\Models\Grupo::class, 'idGrupo', 'id');
    }


}
