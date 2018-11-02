<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Evangelio extends Model {

    /**
     * Generated
     */
    use SoftDeletes;
    protected $table = 'evangelio';
    protected $fillable = ['id', 'titulo', 'texto', 'idUsuario', 'fechaDeValides', 'deleted_at'];
    protected $dates = ['deleted_at'];


    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'idUsuario', 'id');
    }


}
