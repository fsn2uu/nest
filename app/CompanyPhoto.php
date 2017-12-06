<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyPhoto extends Model
{
    protected $fillable = [
        'company_id',
        'filename',
    ];
    
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
