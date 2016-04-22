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
        try {
                $bill = app('BillingInterface');
                $customer_id = $bill->charge( $request->all() );
                
                $user = User::find(1);
                $user->billing_id = $customer_id;
                $user->save();

        } catch (Exception $e) {
            return redirect()->back()->with( $e->getMessage() );
        }
    }
}
