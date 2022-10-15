<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'estados';
    public $timestamps = false;
    protected $primaryKey = 'CEstado';
    public $incrementing = false;
    
    protected $fillable = [
        'CPais',
        'NombreEstado'
    ];

    public function towns()
    {
        return $this->hasMany(Town::class, 'CEstado');
    }

    public function postalCodes()
    {
        return $this->hasMany(PostalCode::class, 'CEstado');
    }
}
