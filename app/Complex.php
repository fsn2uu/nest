<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complex extends Model
{
    protected $fillable = [
        'name',
        'description',
        'address',
        'address2',
        'city',
        'state',
        'zip',
        'phone',
        'phone2',
        'url',
        'schedule_id',
        'amenities',
    ];

    public function units()
    {
        return $this->hasMany('\App\Unit');
    }

    public function photos()
    {
        return $this->hasMany('\App\ComplexPhoto')->orderBy('order');
    }

    public function schedule()
    {
        return $this->belongsTo('\App\Schedule');
    }
}
