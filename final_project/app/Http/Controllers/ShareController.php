<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ShareController extends Controller {


    public function store(Request $request)
    {
        $name = $request::url();

        //
    }

}
