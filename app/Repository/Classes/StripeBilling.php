<?php

namespace App\Repository\Classes;

use Config;
use Stripe;
use Stripe_Customer;
use Stripe_Charge;
use Stripe_CardError;
use App\Repository\Interfaces\BillingInterface;


class StripeBilling implements BillingInterface
{
	
	function __construct()
	{
		Stripe::setApiKey(Config::get(('stripe.secret_key')));
	}
	/**
	 * Charge a user
	 *
	 * @param array $data
	 * @return null
	 */
	public function charge(array $data)
	{
		try {
			$customer = Stripe_Customer::create([
				'card' => $data['stripeToken'],
				'email' => $data['email']
			]);
			
			Stripe_Charge::create([
				'customer' => $customer->id,
				'amount' => 1000,
				'currency' => 'usd'
			]);

			return $customer->id;
		} catch (Stripe_CardError $e) {
			dd( $e->getMessage() );	
		}
	}
}