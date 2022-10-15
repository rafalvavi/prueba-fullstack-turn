<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $primaryKey = 'IdUser';

    protected $fillable = [
        'FK_IdUser',
        'Name',
        'LastName',
        'Company',
        'Email',
        'Phone',
        'Discount',
        'BusinessName',
        'Cfdi',
        'Rfc',
        'Type',
        'Location',
        'Role',
        'Status',
    ];

    protected $hidden = [
        'Password'
    ];

    public function wholesalers()
    {
        return $this->hasMany(User::class, 'FK_IdUser')->where('Role', 'Mayorista');
    }

    public function address()
    {
        return $this->hasOne(Address::class, 'FK_IdUser');
    }

    public function billingData()
    {
        return $this->hasOne(BillingData::class, 'FK_IdUser');
    }
}
