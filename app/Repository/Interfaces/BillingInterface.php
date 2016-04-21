<?php 

namespace App\Repository\Interfaces;

interface BillingInterface {

	public function charge(array $charge);

}