<?php namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;

class SalesAgentController extends Controller
{
	public function index()
	{
		return $this->renderView('providers.index');
	}
}