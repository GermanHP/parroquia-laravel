<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Migration extends Model {

    /**
     * Generated
     */
    use SoftDeletes;
    protected $table = 'migrations';
    protected $fillable = ['id', 'migration', 'batch'];
    protected $dates = ['deleted_at'];



}
