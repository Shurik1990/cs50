<?php

namespace App\Http\Controllers;

use AppController;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;


class Controller extends BaseController
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home');
	}
	protected function validator(array $data)
	{
    return Validator::make($data, [
        'name' => 'required|name|max:255|unique:users',
        'password' => 'required|confirmed|min:6',
    ]);
	}
	use ValidatesRequests;
	
	protected $redirectTo = '/home';
}
