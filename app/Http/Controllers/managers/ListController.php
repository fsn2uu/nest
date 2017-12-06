<?php

namespace App\Http\Controllers\managers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use LaraFlash;
use Session;
use \App\User;
use \App\Company;
use Hash;

class ListController extends Controller
{
    public function stepOne(Request $request)
    {
        return view('auth.manager_register.step-one');
    }

    public function stepTwo(Request $request)
    {
        \Validator::validate(\Request::all(), [
            'name'    => 'required',
            'email'    => 'required|email|unique:users',
            'password'    => 'required|min:8|confirmed',
        ]);

        return view('auth.manager_register.step-two');
    }

    public function stepThree(Request $request)
    {
        \Validator::validate(\Request::all(), [
            'name'    => 'required',
            'phone'    => 'required',
            'email'    => 'required|email|unique:companies',
            'address'    => 'required',
            'city'    => 'required',
            'state'    => 'required',
            'zip'    => 'required',
        ]);

        return view('auth.manager_register.step-three');
    }

    public function stepFour(Request $request)
    {
        //dd($request->all());

        \Stripe\Stripe::setApiKey(env('STRIPE_SEC_KEY'));

        //create the customer
        $stripe_user = \Stripe\Customer::create(array(
          "description" => "Subscribe " . $request->company_name,
          "source" => $request->stripeToken,
          "email" => $request->company_email,
        ));

        //create the company
        $company = new Company;
        $company->name = $request->company_name;
        $company->slug = str_slug($request->company_name);
        $company->phone = $request->company_phone;
        $company->email = $request->company_email;
        $company->address = $request->company_address;
        $company->address2 = $request->company_address2;
        $company->city = $request->company_city;
        $company->state = $request->company_state;
        $company->zip = $request->company_zip;
        $company->url = $request->company_url;
        $company->stripe_id = $stripe_user->id;
        $company->save();

        //create the user
        $user = new User;
        $user->name = $request->user_name;
        $user->email = $request->user_email;
        $user->company_id = $company->id;
        $user->password = Hash::make($request->user_password);
        $user->save();

        $user->attachRole(2);

        //echo '<pre>', print_r($stripe_user->id), '</pre>';
        //create the subscription
        \Stripe\Stripe::setApiKey(env('STRIPE_SEC_KEY'));

        //create the charge
        \Stripe\Subscription::create(array(
          "customer" => $stripe_user->id,
          "items" => array(
            array(
              "plan" => $request->plan_id,
            ),
          )
        ));

        //$plan = \Stripe\Plan::retrieve($request->plan_id);

        switch ($request->plan_id) {
            case 'nest-1':
                $setup_amount = 25000;
                break;

            case 'nest-2':
                $setup_amount = 50000;
                break;

            case 'nest-3':
                $setup_amount = 150000;
                break;
        }

        //charge the deposit
        \Stripe\Stripe::setApiKey(env('STRIPE_SEC_KEY'));
        $charge = \Stripe\Charge::create([
            'amount' => $setup_amount,
            'customer' => $company->stripe_id,
            'currency' => 'usd',
            //'source' => 'tok_189fqt2eZvKYlo2CTGBeg6Uq'
        ]);

        $company->update(['status' => 'active']);

        //log the user in
        if (Auth::attempt(['email' => $user->email, 'password' => $user->password]))
        {
            return redirect()->route('home');
        }
    }
}
