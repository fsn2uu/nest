<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplexPhoto extends Model
{
    protected $fillable = [
        'complex_id',
        'filename',
        'order',
    ];
    
    public function complex()
    {
        return $this->belongsTo('App\Complex');
    }
}
