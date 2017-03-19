<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use AuthenticatesUsers
use Validator;
use App\Code;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\CodeController;
use Session;

class AuthController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }
	
	public function getLogout()
	{
		Auth::logout();

    return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/login');
	}	

    public function getLogin(){
        // Do your custom login magic here.
    }
	
	protected function validator(array $data)
	
	{
    return Validator::make($data, [
        'name' => 'required|name|max:255|unique:users',
        'password' => 'required|confirmed|min:6',
    ]);
	}
	
}
