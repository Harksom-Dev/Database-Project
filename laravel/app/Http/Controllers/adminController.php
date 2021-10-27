<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    function index(){
        $var = 1002;
        $employee=DB::table('employees')
        ->select('employees.*')
        ->where('employeess.employeeNumber', $var);
        // dd($employee);
        return view('employees');
    }

}
