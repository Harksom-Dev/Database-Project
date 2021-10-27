<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class testController extends Controller
{
    //
    public function test ($id) {
        $user = DB::table('employees_logindata')
        ->select('*')
        ->where('employees_logindata.employeeNumber', $id)
        ->get();
        return $user;
    }
}
