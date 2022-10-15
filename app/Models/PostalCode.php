<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PostalCode extends Model
{
    protected $table = 'codigos_postales';
    public $timestamps = false;
    protected $primaryKey = 'CCp';
    public $incrementing = false;
    
    protected $fillable = [
        'CEstado',
        'CMunicipio',
        'CLocalidad'
    ];

    public function state()
    {
        return $this->belongsTo(State::class, 'CEstado');
    }

    public function town()
    {
        return $this->belongsTo(Town::class, 'CMunicipio');
    }

    public function colony()
    {
        return $this->hasOne(Colony::class, 'CCodigoPostal');
    }
}
