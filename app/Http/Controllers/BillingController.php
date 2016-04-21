<?php

namespace App\Http\Controllers;

use App;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;


class BillingController extends Controller
{
    /**
     * Charge a user
     *
     * @param null
     * @return null
     */
    public function store(Request $request)
    {
        $bill = app('BillingInterface');
        $customer_id = $bill->charge( $request->all() );
        
        $user = User::first();
        $user->billing_id = $customer_id;
        $user->save();
    }
}
