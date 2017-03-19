<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DatabaseController extends Controller
{
protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required',
            'password' => 'required',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
			'id' => $data['id'],
            'name' => $data['name'],
            'password' => bcrypt($data['password']),
            'is_activated' => 0,
        ]);
    }

    public function signup(Request $request){

        $input = $request->all();

        $validator = $this->validator($input);

        return back()->with('errors', $validator->errors());
    }
}