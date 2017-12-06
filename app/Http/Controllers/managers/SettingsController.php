<?php

namespace App\Http\Controllers\managers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class SettingsController extends Controller
{
    public function index()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SEC_KEY'));

        $cust = \Stripe\Customer::retrieve(Auth::user()->company->stripe_id);
        $cplan = $cust->subscriptions->data[0]->plan->id;

        $plans = \Stripe\Plan::all();

        return view('managers.settings.index')
            ->withCplan($cplan)
            ->withPlans($plans);
    }
}
