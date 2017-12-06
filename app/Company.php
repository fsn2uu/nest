<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'company_id',
        'phone',
        'email',
        'address',
        'address2',
        'city',
        'state',
        'zip',
        'url',
        'status',
    ];

    public function users()
    {
        return $this->hasMany('\App\User');
    }

    public function complexes()
    {
        return $this->hasMany('\App\Complex');
    }

    public function units()
    {
        return $this->hasMany('\App\Unit');
    }

    public function schedules()
    {
        return $this->hasMany('\App\Schedule');
    }

    public function logo()
    {
        return $this->hasOne('\App\CompanyPhoto');
    }
}
