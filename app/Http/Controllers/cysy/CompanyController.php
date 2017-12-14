<?php

namespace App\Http\Controllers\cysy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company as Company;
use App\CompanyPhoto as CompanyPhoto;
use Session;
use LaraFlash;

class CompanyController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth:cysy');
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();

        if(Session::has('deleted'))
        {
            LaraFlash::add('The company has been deleted.', ['title' => 'It was good while it lasted.', 'priority' => 3, 'type' => 'info']);
        }

        return view('cysy.companies.index')
            ->withCompanies($companies);
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

        return view('cysy.companies.create');
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
            'name' => 'required|min:3|unique:companies',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'url' => 'required',
        ]);

        if($company = Company::create($request->except(['_token', 'logo'])))
        {
            $company->update(['slug' => str_slug($company->name)]);
            $company->update(['api_key' => str_random(45)]);
            $company->update(['token_id' => str_random(45)]);

            if($request->logo)
            {
                $filename = $request->logo->store('public/companies');

                CompanyPhoto::create(
                    [
                        'company_id'    => $company->id,
                        'filename'      => str_replace('public', 'storage', $filename),
                    ]
                );
            }

            Session::flash('createSuccess', 'message');

            return redirect()->route('cysy.companies.show', $company->id);
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
        $company = Company::findOrFail($id);

        if(Session::has('updateSuccess'))
        {
            LaraFlash::add($company->name . ' was Successfully Updated', array('title' => 'Yay! ', 'priority' => 3, 'type' => 'success'));
        }
        elseif(Session::has('updateFailed') || Session::has('createFailed'))
        {
            LaraFlash::add('Something went wrong.  Check your data and try again.', ['title' => 'Well, that didn\'t work!', 'priority' => 5, 'type' => 'danger']);
        }
        elseif(Session::has('createSuccess'))
        {
            LaraFlash::add($company->name . ' was Successfully Created', array('title' => 'Yay! ', 'priority' => 3, 'type' => 'success'));
        }

        return view('cysy.companies.show')
            ->withCompany($company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);

        if(Session::has('updateFailed') || Session::has('createFailed'))
        {
            LaraFlash::add('Something went wrong.  Check your data and try again.', ['title' => 'Well, that didn\'t work!', 'priority' => 5, 'type' => 'danger']);
        }

        return view('cysy.companies.edit')
            ->withCompany($company);
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
        $this->validate($request, [
            'name' => 'required|min:3',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'url' => 'required',
        ]);

        $company = Company::find($id);

        if($company->update($request->except(['_token', '_method', 'logo'])))
        {
            $company->update(['slug' => str_slug($company->name)]);

            if($request->logo)
            {
                $filename = $request->logo->store('public/companies');

                CompanyPhoto::create(
                    [
                        'company_id'    => $company->id,
                        'filename'      => str_replace('public', 'storage', $filename),
                    ]
                );
            }

            Session::flash('updateSuccess', 'it worked');

            return redirect()->route('cysy.companies.show', $company->id);
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
        $company = Company::find($id)->delete();

        Session::flash('deleted', 'message');

        return redirect()->route('cysy.companies.index');
    }
}
