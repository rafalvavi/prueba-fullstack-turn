<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    protected $primaryKey = 'IdAddress';
    
    protected $fillable = [
        'FK_IdUser',
        'IqualAdress',
        'ContactName',
        'Address',
        'PostalCode',
        'Neighborhood',
        'City',
        'State',
        'Email',
        'Phone',
        'Type',
        'Status'
    ];
}
