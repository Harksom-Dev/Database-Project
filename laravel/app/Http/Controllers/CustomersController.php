<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller
{
    function index(Request $request){
            $customers = Customer::WHERE([
                ['customerName','!=', Null],
                [function ($query) use ($request){
                    if(($term = $request-> term)){
                        $query-> orWhere('customerName', 'LIKE', '%' . $term . '%')-> get();
                    }
                }]
            ])
            -> paginate(10);

        if(count($customers) != 0){
            return view('customer', compact('customers')) -> with('i', (request()->input('page', 1) -1 ) *5 );
        }else {
            return view('customer', compact('customers')) -> withMessage('No User Found !. Try to search again !');
        }
    }

    public function getSelaeRepByEmployee($id)
    {
        $customers = DB::table('customers')
        ->join('employees','customers.salesRepEmployeeNumber',"=",'employees.employeeNumber')
        //Customer::join('employees','customers.salesRepEmployeeNumber',"=",'employees.employeeNumber')
        ->where('employees.employeeNumber',$id)
        ->get(['customerNumber','customerName','salesRepEmployeeNumber',
            'employeeNumber','lastName','firstName','jobTitle']);
        return $customers;
    }
    
}


/*
    public function store(Request $request){
        $this -> validate($request,[
            'customerName' => 'require',
            'contactFirstName' => 'require',
            'contactLastName' => 'require',
            'phone' => 'require',
            'adressLine1' => 'require',
            'adressLine2' => 'require',
            'city' => 'require',
            'postalCode' => 'require',
            'country' => 'require',
        ]);

        $cust = new Customer;
        $cust -> customerName = $request->input('customerName');
        $cust -> customerName = $request->input('customerName');
        $cust -> customerName = $request->input('customerName');
        $cust -> customerName = $request->input('customerName');
        $cust -> customerName = $request->input('customerName');
        $cust -> customerName = $request->input('customerName');
        $cust -> customerName = $request->input('customerName');
        $cust -> customerName = $request->input('customerName');
        $cust->save();


        return redirect(employees)->with('success', 'Data saved');
    }















*/