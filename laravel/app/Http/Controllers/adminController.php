<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    function index(){
        $var = 1002;
        $employees=DB::table('employees')
        ->select('employees.*')
        ->where('employeeNumber',$var)
        ->get();
        return view('admin',compact('employees'));
    }

}
