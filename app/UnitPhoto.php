<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitPhoto extends Model
{
    protected $fillable = [
        'unit_id',
        'filename',
        'description',
        'alt',
        'order',
    ];

    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }
}
