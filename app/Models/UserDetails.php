<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'UserBirthDate',
        'UserPhoneNumber',
        'UserCountry',
        'UserProvince',
        'UserRegency',
        'UserSubdistrict',
        'UserVillage',
        'UserAddress',
        'UserAddressDetails',
        'PostalCode',
        'User_id',
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'User_id');
    }
    
}
