<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'complex_id',
        'unit_id',
        'name',
    ];

    public function rates()
    {
        return $this->hasMany('\App\Rate');
    }
}
