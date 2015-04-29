<?php


	return array (
		/***
		 * paypal configurations to be used in the payment with paypal gateway
		 *
		 *
		 * driver will decide which method to be used with the paypal
		 * possible values REST
		 */

		'driver'        => 'REST' ,

		/**
		 * decides weather currently sandbox / live
		 */
		'mode'     => 'sandbox' ,

		/**
		 * you can give currency that is supported by paypal
		 */
		'currency'      => 'USD' ,
		/**
		 * client id and client secret will be used when using rest driver
		 */
		'client_id'     => 'AQgaYwUnqtKYQbUq4RKyUR5x2OLwgKD5byLvsRboegrZQxOlYeH3i-0VqJ0LanB76zbd4sgrgdExqz4z' ,

		'client_secret' => 'ECDzORYmmlZp0LA0fosA3q9uy-65bjl9wvlkU6IlHQycWIDkttLGizCpQNAKBuIVvR0fAMPcCz8mTbYG' ,

		/***
		 * please do not change below this!
		 */
		'configurations'    =>  array(
			/**
			 * connection timeout
			 */
			'http.CURLOPT_CONNECTTIMEOUT' => 30,

			'log.LogEnabled'    =>  true,

			'log.FileName'  =>  storage_path('logs/paypal.log'),

			/**
			 * valid values can be DEBUG, INFO, WARN, ERROR
			 */
			'log.LogLevel'  =>  'INFO'
		),
	);