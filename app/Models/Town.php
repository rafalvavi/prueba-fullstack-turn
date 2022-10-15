<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $table = 'ciudades';
    public $timestamps = false;
    protected $primaryKey = 'CMunicipio';
    public $incrementing = false;
    
    protected $fillable = [
        'CEstado',
        'Descripcion'
    ];
}
