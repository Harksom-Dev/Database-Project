<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class customerController extends Controller
{
    
    public function memberCheck(){
        return view('memberCheck');
    }

    public function check(Request $request){
        $request->validate([
            'customerNumber' => 'required|numeric', 
            ]);
        $customerNumber = $request->customerNumber;
        $customer = DB::table('customers')
        ->where('customerNumber',$customerNumber)
        ->get();
        
        if($customer->first()){ //check if query is empty or not
            return redirect()->route('catalog');
        }else{
            //redirect to register member
            return view('test');
        }
        
        
    }
}
