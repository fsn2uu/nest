<?php

namespace App\Http\Controllers\managers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use LaraFlash;
use Session;
use \App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('company_id', Auth::user()->company_id)
            ->get();

            if(Session::has('deleted'))
            {
                LaraFlash::add('The user has been deleted.', ['title' => 'Well, it was good while it lasted.', 'priority' => 3, 'type' => 'info']);
            }

        return view('managers.users.index')
            ->withUsers($users);
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

        return view('managers.users.create');
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
            'role_id'    => 'required',
            'name'    => 'required',
            'email'    => 'required|email|unique:users',
            'phone'    => 'required',
            'password'    => 'required|min:8',
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->company_id = Auth::user()->company_id;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);

        if($user->save())
        {
            $user->attachRole($request->role_id);

            Session::flash('createSuccess', 'message');

            return redirect()->route('managers.users.show', $user->id);
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
        $user = User::where('company_id', Auth::user()->company_id)
            ->where('id', $id)
            ->first();

        if(Session::has('updateSuccess'))
        {
            LaraFlash::add($user->name . ' was Successfully Updated', array('title' => 'Yay! ', 'priority' => 3, 'type' => 'success'));
        }
        elseif(Session::has('updateFailed') || Session::has('createFailed'))
        {
            LaraFlash::add('Something went wrong.  Check your data and try again.', ['title' => 'Well, that didn\'t work!', 'priority' => 5, 'type' => 'danger']);
        }
        elseif(Session::has('createSuccess'))
        {
            LaraFlash::add($user->name . ' was Successfully Created', array('title' => 'Yay! ', 'priority' => 3, 'type' => 'success'));
        }

        return view('managers.users.show')
            ->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('company_id', Auth::user()->company_id)
            ->where('id', $id)
            ->first();

        if(Session::has('updateFailed') || Session::has('createFailed'))
        {
            LaraFlash::add('Something went wrong.  Check your data and try again.', ['title' => 'Well, that didn\'t work!', 'priority' => 5, 'type' => 'danger']);
        }

        return view('managers.users.edit')
            ->withUser($user);
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
            'role_id'    => 'required',
            'name'    => 'required',
            'email'    => 'required|email|unique:users',
            'phone'    => 'required',
        ]);

        $user = User::where('company_id', Auth::user()->company_id)
            ->where('id', $id)
            ->first();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->has('password'))
        {
            $user->password = Hash::make($request->password);
        }

        if($user->save())
        {
            $user->attachRole($request->role_id);

            Session::flash('updateSuccess', 'message');

            return redirect()->route('managers.users.show', $user->id);
        }

        Session::flash('updateFailed', 'message');

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
        $user = User::find($id)->delete();

        Session::flash('deleted', 'message');

        return redirect()->route('managers.users.index');
    }
}
