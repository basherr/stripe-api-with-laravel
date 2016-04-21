<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="publishable-key" content="{!! Config::get('stripe.publishable_key') !!}">
	<title>Billing with stripe</title>
</head>
<body>
	<h2>Buy for $10</h2>
	{!! Form::open(['url' => 'buy', 'id' => 'bill_form']) !!}
		<div class="payments-error alert alert-danger" style="display: none;"></div>
		<div class="row">
			<label>Card Number</label>
			<input type="text" data-stripe="number">
		</div>
		<div class="row">
			<label>CVC:</label>
			<input type="text" data-stripe="cvc">
		</div>
		<div class="row">
			<label>Expiration Date:</label>
			{!! Form::selectMonth(null, '', ['data-stripe' => 'exp_month']) !!}
			{!! Form::selectYear(null, date('Y'), date('Y') + 10, null, ['data-stripe' =>  'exp-year']) !!}
		</div>
		<div class="row">
			<label>Email:</label>
			<input type="email" name="email">
		</div>
		<input type="submit" value="Buy">
	{!! Form::close() !!}
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	{!! Html::script('js/billing.js') !!}
</body>
</html>