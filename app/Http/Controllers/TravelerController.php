<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Unit;
use \App\Complex;

class TravelerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $units = Unit::whereHas('company', function($query){
            $query->where('status', 'active');
        })
        ->where('status', 'published')
        ->where(function($query){
            $query->whereNotNull('schedule_id')
            ->orWhereHas('complex', function($subquery){
                $subquery->whereNotNull('schedule_id');
            });
        })
        ->filter($request->except(['_token', '_method', 'orderBy']))
        ->paginate(20);

        return view('travelers.search')
            ->withUnits($units);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unit = Unit::where('id', $id)
        ->whereHas('company', function($query){
            $query->where('status', 'active');
        })
        ->where('status', 'published')
        ->where(function($query){
            $query->whereNotNull('schedule_id')
            ->orWhereHas('complex', function($subquery){
                $subquery->whereNotNull('schedule_id');
            });
        })
        ->first();

        return view('travelers.show')
            ->withUnit($unit);
    }
}
