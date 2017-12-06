<?php

namespace App\Http\Controllers\managers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Schedule as Schedule;
use App\Rate as Rate;
use Auth;
use LaraFlash;
use Session;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::all();

        if(Session::has('deleted'))
        {
            LaraFlash::add('The schedule has been deleted.', ['title' => 'It was good while it lasted.', 'priority' => 3, 'type' => 'info']);
        }

        return view('managers.rates.index')
            ->withSchedules($schedules);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Session::has('updateFailed') || Session::has('createFailed'))
        {
            LaraFlash::add('Something went wrong.  Check your data and try again.', ['title' => 'Well, that didn\'t work!', 'priority' => 5, 'type' => 'danger']);
        }

        return view('managers.rates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $schedule = Schedule::create(['name' => $request->name, 'company_id' => Auth::user()->company_id]);

        foreach($request->rates as $r)
        {
            $start = \Carbon\Carbon::parse($r['start']);
            $end = \Carbon\Carbon::parse($r['end']);
            $rate = Rate::create([
                'schedule_id'   => $schedule->id,
                'name'          => $r['name'],
                'start'         => $start->format('Y-m-d'),
                'end'           => $end->format('Y-m-d'),
                'daily'         => $r['daily'],
                'weekly'        => $r['weekly'],
            ]);
        }

        if($request->complex_id)
        {
            foreach($request->complex_id as $r => $v)
            {
                $complex = \App\Complex::find($v);

                $complex->schedule_id = $schedule->id;

                $complex->save();
            }
        }

        if($request->unit_id)
        {
            foreach($request->unit_id as $r => $v)
            {
                $unit = \App\Unit::find($v);

                $unit->schedule_id = $schedule->id;

                $unit->save();
            }
        }

        Session::flash('createSuccess', 'message');

        return redirect()->route('managers.rates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schedule = Schedule::find($id);

        if(Session::has('updateSuccess'))
        {
            LaraFlash::add($schedule->name . ' was Successfully Updated', array('title' => 'Yay! ', 'priority' => 3, 'type' => 'success'));
        }
        elseif(Session::has('updateFailed') || Session::has('createFailed'))
        {
            LaraFlash::add('Something went wrong.  Check your data and try again.', ['title' => 'Well, that didn\'t work!', 'priority' => 5, 'type' => 'danger']);
        }
        elseif(Session::has('createSuccess'))
        {
            LaraFlash::add($schedule->name . ' was Successfully Created', array('title' => 'Yay! ', 'priority' => 3, 'type' => 'success'));
        }

        return view('managers.rates.show')
            ->withSchedule($schedule);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Session::has('updateFailed') || Session::has('createFailed'))
        {
            LaraFlash::add('Something went wrong.  Check your data and try again.', ['title' => 'Well, that didn\'t work!', 'priority' => 5, 'type' => 'danger']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Session::flash('updateSuccess', 'it worked');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Session::flash('deleted', 'it worked');
    }
}
