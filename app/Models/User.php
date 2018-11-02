<?php namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {

    /**
     * Generated
     */
    use SoftDeletes;
    use Notifiable;
    protected $table = 'users';
    protected $fillable = ['id', 'nombre', 'apellido', 'fechaDeNacimiento', 'genero', 'resetPassword', 'TokenPush', 'email', 'DUI', 'password', 'remember_token', 'deleted_at'];
    protected $dates = ['deleted_at'];
    protected $hidden = [
        'password', 'remember_token','email','TokenPush','DUI','resetPassword'
    ];
    public function rolessistemas() {
        return $this->belongsToMany(\App\Models\Rolessistema::class, 'rolessistemausuario', 'idUsuario', 'idRolSistema');
    }

    public function tipotelefonos() {
        return $this->belongsToMany(\App\Models\Tipotelefono::class, 'telefono', 'idUsuario', 'idTipoTelefono');
    }

    public function actividadesusuarios() {
        return $this->hasMany(\App\Models\Actividadesusuario::class, 'idUsuario', 'id');
    }

    public function evangelios() {
        return $this->hasMany(\App\Models\Evangelio::class, 'idUsuario', 'id');
    }

    public function gruposusuarios() {
        return $this->hasMany(\App\Models\Gruposusuario::class, 'idUsuario', 'id');
    }

    public function noticias() {
        return $this->hasMany(\App\Models\Noticia::class, 'idUsuario', 'id');
    }

    public function rolessistemausuarios() {
        return $this->hasMany(\App\Models\Rolessistemausuario::class, 'idUsuario', 'id');
    }

    public function telefonos() {
        return $this->hasMany(\App\Models\Telefono::class, 'idUsuario', 'id');
    }


}
