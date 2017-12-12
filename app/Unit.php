<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'complex_id',
        'name',
        'unit_no',
        'beds',
        'baths',
        'sleeps',
        'pet_friendly',
        'address',
        'address2',
        'city',
        'state',
        'zip',
        'description',
    ];

    public function scopeFilter($query, $value = [])
    {
        if(is_array($value)):
            foreach($value as $k => $v):
                if($v != ''):
                    if(is_array($v)):
                        return $query->where($k, $v[0], $v[1]);
                    else:
                        return $query->where($k, $v);
                    endif;
                endif;
            endforeach;
        endif;
    }

    public function complex()
    {
        return $this->belongsTo('\App\Complex');
    }

    public function company()
    {
        return $this->belongsTo('\App\Company');
    }

    public function photos()
    {
        return $this->hasMany('\App\UnitPhoto')->orderBy('order');
    }

    public function schedule()
    {
        return $this->belongsTo('\App\Schedule');
    }

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at']);
    }

    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at']);
    }
}
