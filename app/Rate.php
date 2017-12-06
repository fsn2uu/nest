<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = [
        'schedule_id',
        'name',
        'start',
        'end',
        'daily',
        'weekly',
    ];

    public function schedule()
    {
        return $this->belongsTo('\App\Schedule');
    }
}
