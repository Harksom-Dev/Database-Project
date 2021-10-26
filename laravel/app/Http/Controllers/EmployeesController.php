<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;

class EmployeesController extends Controller
{
    function index(){
        //$employees = DB::table('employees')->get();
        $employees = Employee::paginate(12);
        return view('employees', compact('employees'));
    }

}
