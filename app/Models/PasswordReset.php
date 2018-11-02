<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PasswordReset extends Model {

    /**
     * Generated
     */
    use SoftDeletes;
    protected $table = 'password_resets';
    protected $fillable = ['email', 'token'];
    protected $dates = ['deleted_at'];



}
