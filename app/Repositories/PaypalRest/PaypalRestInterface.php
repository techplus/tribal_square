<?php namespace App\Repositories\PaypalRest;

interface PaypalRestInterface {

	public function getItemObject();

	public function addItem($details);

	public function addAmount($description,$total);

	public function addDetails($shipping,$tax,$subtotal);

	public function addPayer();

	public function addRedirectUrls($returnUrl,$cancelUrl);

	public function pay();

	public function executePayment($payer_id,$payment_id);

	public function getPayment($payment_id);
}