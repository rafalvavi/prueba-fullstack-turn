<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BillingData extends Model
{
    protected $table = 'billingsdatas';
    protected $primaryKey = 'IdBillingdata';
    
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
