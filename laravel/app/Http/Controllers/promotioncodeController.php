<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class promotioncodeController extends Controller
{
    //
    public function check(Request $request){
        dd($request->input('code'));
        return view('test');
    }
}
