<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Colony extends Model
{
    protected $table = 'colonias';
    public $timestamps = false;
    protected $primaryKey = 'CColonia';
    public $incrementing = false;
    
    protected $fillable = [
        'CCodigoPostal',
        'CNombreAsentamiento'
    ];
}
