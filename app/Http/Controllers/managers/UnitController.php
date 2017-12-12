<?php

namespace App\Http\Controllers\managers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Unit as Unit;
use App\UnitPhoto as UnitPhoto;
use Validator;
use Auth;
use LaraFlash;
use Session;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('order'))
        {
            $order = $request->order;
        }
        else
        {
            $order = 'name';
        }

        $units = Unit::orderBy($order)
        ->where('company_id', Auth::user()->company_id)
        ->filter($request->except(['_token', '_method', 'orderBy']))
        ->get();

        if(Session::has('deleted'))
        {
            LaraFlash::add('The unit has been deleted.', ['title' => 'It was good while it lasted.', 'priority' => 3, 'type' => 'info']);
        }

        return view('managers.units.index')
            ->withUnits($units);
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

        \Stripe\Stripe::setApiKey(env('STRIPE_SEC_KEY'));

        $cust = \Stripe\Customer::retrieve(Auth::user()->company->stripe_id);
        $plan = $cust->subscriptions->data[0]->plan->id;

        $unit_count = Unit::where('company_id', Auth::user()->company_id)
        ->count();

        switch ($plan)
        {
            case 'nest-1':
                $limit_reached = $unit_count >= 5 ? 'yes' : 'no';
                break;

            case 'nest-2':
                # code...35
                $limit_reached = $unit_count >= 35 ? 'yes' : 'no';
                break;

            case 'nest-3':
                # code...150
                $limit_reached = $unit_count >= 150 ? 'yes' : 'no';
                break;

            default:
                $limit_reached = 'no';
                break;
        }

        return view('managers.units.create')
            ->withLimitreached($limit_reached);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->status == 'published')
        {
            $messages = [
                'name.required_without' => 'The unit name field is required if the unit is not attached to a complex.',
                'complex_id.required_without' => 'The unit must be attached to a complex if the name is left blank.',
                'address.required_without' => 'The unit address cannot be blank if there is no complex attached.',
                'city.required_without' => 'The unit city cannot be blank if there is no complex attached.',
                'state.required_without' => 'The unit state cannot be blank if there is no complex attached.',
                'zip.required_without' => 'The unit zip code cannot be blank if there is no complex attached.',
            ];

            $this->validate($request, [
                'name'  => 'required_without:complex_id',
                'complex_id'  => 'required_without:name',
                'type'  => 'required',
                'beds'  => 'required',
                'baths'  => 'required',
                'sleeps'  => 'required',
                'address'  => 'required_without:complex_id',
                'city'  => 'required_without:complex_id',
                'state'  => 'required_without:complex_id',
                'zip'  => 'required_without:complex_id',
            ], $messages);
        }

        $unit = new Unit;
        $unit->company_id = Auth::user()->company_id;
        $unit->complex_id = $request->complex_id;
        $unit->name = $request->name;
        $unit->unit_no = $request->unit_no;
        $unit->type = $request->type;
        $unit->beds = $request->beds;
        $unit->baths = $request->baths;
        $unit->sleeps = $request->sleeps;
        $unit->pet_friendly = $request->pet_friendly;
        $unit->address = $request->address;
        $unit->address2 = $request->address2;
        $unit->city = $request->city;
        $unit->state = $request->state;
        $unit->zip = $request->zip;
        $unit->description = $request->description;
        $unit->schedule_id = $request->schedule_id;
        $unit->status = $request->status;
        $unit->amenities = implode(', ', $request->amenities);

        if($unit->save())
        {
            if($request->photos != '')
            {
                $i = 1;
                foreach($request->photos as $photo)
                {
                    $filename = $photo->store('public/units');

                    UnitPhoto::create(
                        [
                            'unit_id'       => $unit->id,
                            'filename'      => str_replace('public', 'storage', $filename),
                            'order'         => $i,
                        ]
                    );

                    $i++;
                }
            }

            Session::flash('createSuccess', 'message');

            return redirect()->route('managers.units.show', $unit->id);
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
        $unit = Unit::where('id', $id)->where('company_id', Auth::user()->company_id)->first();

        $name = isset($unit->complex) ? $unit->complex->name.' ' : '';
        $name .= $unit->name ? $unit->name.' ' : '';
        $name .= $unit->unit_no ? 'Unit '.$unit->unit_no : '';

        if(Session::has('updateSuccess'))
        {
            LaraFlash::add($name . ' was Successfully Updated', array('title' => 'Yay! ', 'priority' => 3, 'type' => 'success'));
        }
        elseif(Session::has('updateFailed') || Session::has('createFailed'))
        {
            LaraFlash::add('Something went wrong.  Check your data and try again.', ['title' => 'Well, that didn\'t work!', 'priority' => 5, 'type' => 'danger']);
        }
        elseif(Session::has('createSuccess'))
        {
            LaraFlash::add($name . ' was Successfully Created', array('title' => 'Yay! ', 'priority' => 3, 'type' => 'success'));
        }

        return view('managers.units.show')
            ->withUnit($unit);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit = Unit::where('id', $id)->where('company_id', Auth::user()->company_id)->first();

        if(Session::has('updateFailed') || Session::has('createFailed'))
        {
            LaraFlash::add('Something went wrong.  Check your data and try again.', ['title' => 'Well, that didn\'t work!', 'priority' => 5, 'type' => 'danger']);
        }

        return view('managers.units.edit')
            ->withUnit($unit);
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
        if($request->status == 'published')
        {
            $messages = [
                'name.required_without' => 'The unit name field is required if the unit is not attached to a complex.',
                'complex_id.required_without' => 'The unit must be attached to a complex if the name is left blank.',
                'address.required_without' => 'The unit address cannot be blank if there is no complex attached.',
                'city.required_without' => 'The unit city cannot be blank if there is no complex attached.',
                'state.required_without' => 'The unit state cannot be blank if there is no complex attached.',
                'zip.required_without' => 'The unit zip code cannot be blank if there is no complex attached.',
            ];

            $this->validate($request, [
                'name'  => 'required_without:complex_id',
                'complex_id'  => 'required_without:name',
                'type'  => 'required',
                'beds'  => 'required',
                'sleeps'  => 'required',
                'address'  => 'required_without:complex_id',
                'city'  => 'required_without:complex_id',
                'state'  => 'required_without:complex_id',
                'zip'  => 'required_without:complex_id',
            ], $messages);
        }

        $stuff = $request->except('_method', '_token', 'ex_photos', 'photos', 'amenities');

        if(!$request->has('pet_friendly'))
        {
            $stuff['pet_friendly'] = null;
        }

        $stuff['amenities'] = implode(', ', $request->amenities);

        if($unit = Unit::whereId($id)->update($stuff))
        {
            $max_order = Unit::find($id)->photos->count() + 1;

            if($request->ex_photos)
            {
                foreach($request->ex_photos as $r => $v)
                {
                    UnitPhoto::whereId($r)->update(
                        [
                            'description'    => $v['description'],
                            'alt'            => $v['alt'],
                            'order'          => $v['order'],
                        ]
                    );
                }
            }

            //$i = 1;
            if(!empty($request->photos))
            {
                foreach($request->photos as $photo)
                {
                    $filename = $photo->store('public/units');

                    UnitPhoto::create(
                        [
                            'unit_id'       => $id,
                            'filename'      => str_replace('public', 'storage', $filename),
                            'order'         => $max_order,
                        ]
                    );

                    $max_order++;
                }
            }

            Session::flash('updateSuccess', 'it worked');

            return redirect()->route('managers.units.show', $id);
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
        $unit = Unit::where('id', $id)->where('company_id', Auth::user()->company_id)->first()->delete();

        Session::flash('deleted', 'message');

        return redirect()->route('managers.units.index');
    }

    public function axiosPhotoReorder(Request $request)
    {
        //dd($request);
        foreach($request->images as $r):
            //print_r($r); die();
            if(@$r['id'] && @$r['id'] != ''):
                $photo = UnitPhoto::find($r['id'])->update(['order' => $r['order']]);
            endif;
        endforeach;
    }
}
