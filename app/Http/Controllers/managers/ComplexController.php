<?php

namespace App\Http\Controllers\managers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use LaraFlash;
use Session;
use App\Complex as Complex;
use App\ComplexPhoto as ComplexPhoto;

class ComplexController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complexes = Complex::where('company_id', Auth::user()->company_id)->get();

        if(Session::has('deleted'))
        {
            LaraFlash::add('The complex has been deleted.', ['title' => 'It was good while it lasted.', 'priority' => 3, 'type' => 'info']);
        }

        return view('managers.complexes.index')
            ->withComplexes($complexes);
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

        return view('managers.complexes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'    => 'required',
            'address'    => 'required',
            'city'    => 'required',
            'state'    => 'required',
            'zip'    => 'required',
        ]);

        $complex = new Complex;

        $complex->name = $request->name;
        $complex->company_id = Auth::user()->company_id;
        $complex->description = $request->description;
        $complex->address = $request->address;
        $complex->address2 = $request->address2;
        $complex->city = $request->city;
        $complex->state = $request->state;
        $complex->zip = $request->zip;
        $complex->phone = $request->phone;
        $complex->phone2 = $request->phone2;
        $complex->url = $request->url;
        $complex->schedule_id = $request->schedule_id;
        $complex->amenities = implode(', ', $request->amenities);

        if($complex->save())
        {
            $i = 1;
            foreach($request->photos as $photo)
            {
                $filename = $photo->store('public/complexes');

                ComplexPhoto::create(
                    [
                        'complex_id'    => $complex->id,
                        'filename'      => str_replace('public', 'storage', $filename),
                        'order'         => $i,
                    ]
                );

                $i++;
            }

            Session::flash('createSuccess', 'message');

            return redirect()->route('managers.complexes.show', $complex->id);
        }

        Session::flash('createFailed', 'message');

        return redirect()->back()->withInput($request);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $complex = Complex::where('id', $id)->where('company_id', Auth::user()->company_id)->withCount('units')->first();

        if(Session::has('updateSuccess'))
        {
            LaraFlash::add($complex->name . ' was Successfully Updated', array('title' => 'Yay! ', 'priority' => 3, 'type' => 'success'));
        }
        elseif(Session::has('updateFailed') || Session::has('createFailed'))
        {
            LaraFlash::add('Something went wrong.  Check your data and try again.', ['title' => 'Well, that didn\'t work!', 'priority' => 5, 'type' => 'danger']);
        }
        elseif(Session::has('createSuccess'))
        {
            LaraFlash::add($complex->name . ' was Successfully Created', array('title' => 'Yay! ', 'priority' => 3, 'type' => 'success'));
        }

        return view('managers.complexes.show')
            ->withComplex($complex);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $complex = Complex::where('id', $id)->where('company_id', Auth::user()->company_id)->first();

        if(Session::has('updateFailed') || Session::has('createFailed'))
        {
            LaraFlash::add('Something went wrong.  Check your data and try again.', ['title' => 'Well, that didn\'t work!', 'priority' => 5, 'type' => 'danger']);
        }

        return view('managers.complexes.edit')
            ->withComplex($complex);
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
        //dd($request);

        $this->validate($request, [
            'name'    => 'required',
            'address'    => 'required',
            'city'    => 'required',
            'state'    => 'required',
            'zip'    => 'required',
        ]);

        $complex = Complex::where('id', $id)->where('company_id', Auth::user()->company_id)->first();

        $complex->name = $request->name;
        $complex->description = $request->description;
        $complex->address = $request->address;
        $complex->address2 = $request->address2;
        $complex->city = $request->city;
        $complex->state = $request->state;
        $complex->zip = $request->zip;
        $complex->phone = $request->phone;
        $complex->phone2 = $request->phone2;
        $complex->url = $request->url;
        $complex->schedule_id = $request->schedule_id;
        $complex->amenities = implode(', ', $request->amenities);

        //dd($complex);

        if($complex->save())
        {
            Session::flash('updateSuccess', 'it worked');

            return redirect()->route('managers.complexes.show', $complex->id);
        }

        Session::flash('updateFailed', 'it worked');

        return redirect()->back()->withInput($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $complex = Complex::where('id', $id)->where('company_id', Auth::user()->company_id)->first()->delete();

        Session::flash('deleted', 'message');

        return redirect()->route('cysy.companies.index');
    }

    public function axiosPhotoReorder(Request $request)
    {
        //dd($request);
        foreach($request->images as $r):
            //print_r($r); die();
            if(@$r['id'] && @$r['id'] != ''):
                $photo = ComplexPhoto::find($r['id'])->update(['order' => $r['order']]);
            endif;
        endforeach;
    }
}
