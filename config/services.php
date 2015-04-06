<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => '',
		'secret' => '',
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'User',
		'secret' => '',
	],

	'paypal' => [
		'client_id' => 'AQgaYwUnqtKYQbUq4RKyUR5x2OLwgKD5byLvsRboegrZQxOlYeH3i-0VqJ0LanB76zbd4sgrgdExqz4z',
		'secret' => 'ECDzORYmmlZp0LA0fosA3q9uy-65bjl9wvlkU6IlHQycWIDkttLGizCpQNAKBuIVvR0fAMPcCz8mTbYG'
	],


];
