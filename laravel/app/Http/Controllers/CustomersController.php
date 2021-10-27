<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Query\Builder;

class CustomersController extends Controller
{
    function index(Request $request){
            $customers = Customer::WHERE([
                ['customerName','!=', Null],
                [function ($query) use ($request){
                    if(($term = $request-> term)){
                        $query-> orWhere('customerName', 'LIKE', '%' . $term . '%')
                        -> orWhere('customerNumber', 'LIKE', '%' . $term . '%')
                        -> get();
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

    public function store(Request $request){
        //dd($request -> nputCustomerName);
        //return redirect()-> back();
        // to record
        $orderNum = DB::table('customers')
        ->select('customerNumber')
        ->latest('customerNumber')
        ->value('customerNumber');

        $data = array();
        $data["customerNumber"] = $orderNum+1;
        $data["customerName"] = $request->CustomerName;
        $data["contactFirstName"]= $request->firstName;
        $data["contactLastName"]= $request->lastName;
        $data["phone"] = $request->telphone;
        $data["addressLine1"]= $request->AddressL1;
        $data["addressLine2"]= $request->AddressL2;
        $data["country"] = $request->country;
        $data["city"] = $request->City;
        $data["state"]= $request->State;
        $data["postalCode"] = $request->inputZip;
        $data["TotalPoint"]= 0;

        DB::table('customers')-> insert($data);
        return redirect()->back()->with('success',"Customer Registered");
    
    }

    public function edit($customerNumber){
        //dd($customerNumber);
        $customers = DB::table('customers')
        ->where('customers.customerNumber',$customerNumber)
        ->get();
        //dd($customers);
        return view('editCustomer', compact('customers'));
    }   

    public function addrEdit($id){
        //dd($id->addressLine1);
        $customers = DB::table('customeraddress')
        ->where('customeraddress.customerNumber',$id)
        ->get();
        //dd($customers);
        return view('editAddress', compact('customers'));
    }   



    public function update(Request $request, $id){
        //dd($request);
        DB::table('customers')
                    ->where('customerNumber',$id)
                    ->update([
                        'customerName'=> $request->CustomerName,
                        'contactFirstName' => $request->firstName,
                        'contactLastName'=> $request->lastName,
                        'phone' => $request ->telphone,
                        'addressLine1' => $request->AddressL1,
                        'addressLine2' => $request->AddressL2,
                        'country' => $request->country,
                        'city' => $request->City,
                        'state'=> $request ->State,
                        'postalCode' => $request->inputZip,
                        'TotalPoint' => $request->totalpts
                    ]);

        return redirect()->route('customer')->with('success', 'Customer Updated');
    }

    
    public function updateAddress(Request $request){
        //dd($request);
        DB::table('customeraddress')
                    ->where('addressid',$request-> addressIDPhi)
                    ->update([
                        'customerNumber'=> $request->customerNumber,
                        'addressLine1'=> $request->addressLine1,
                        'addressLine2' => $request->addressLine2,
                        'city'=> $request->city,
                        'state' => $request ->state,
                        'postalCode' => $request->postalCode,
                        'country' => $request->country,
                    ]);

        return redirect()->back()->with('success', 'Customer Updated');
    }





    public function softdelete($id){
        //dd($id);
        $delete = DB::table('customers')
        ->where('customers.customerNumber',$id)
        ->delete();

        return redirect()->back()->with('deleted', 'Customer Deleted');
    }

    public function addrSoftdelete($aid){
        //dd($id);
        $delete = DB::table('customeraddress')
        ->where('customeraddress.addressid',$aid)
        ->delete();

        return redirect()->back()->with('deleted', 'Customer Deleted');
    }

    public function storeAddress(Request $request){ 
        //dd($request->customerNumber);
        //return redirect()-> back();
        // to record
        $orderNum = DB::table('customeraddress')
        ->select('addressid')
        ->latest('addressid')
        ->value('addressid');

        $data = array();
        $data["addressid"] = $orderNum+1;
        $data["customerNumber"] = $request->customerNumber;
        $data["addressLine1"]= $request->addressLine1;
        $data["addressLine2"]= $request->addressLine2;
        $data["city"] = $request->city;
        $data["state"]= $request->state;
        $data["postalCode"]= $request->postalCode;
        $data["country"] = $request->country;
        $data["primaryaddress"] = 0;

        DB::table('customeraddress')-> insert($data);
        return redirect()->back()->with('success',"Address Added");
    } 



}