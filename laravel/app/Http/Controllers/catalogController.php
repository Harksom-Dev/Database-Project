<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
class CatalogController extends Controller
{
    

    public function memberCheck(){
        return view('memberCheck');
    }

    public function check(Request $request){
        $request->validate([
            'customerNumber' => 'required|numeric', //regex is phone format
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

    public function catalog(){
        $products = DB::table('products')
        ->paginate(15);
        // ->get();
        $vendor = DB::table('products')
        ->groupBy('productVendor')
        ->get('productVendor');

        $scale = DB::table('products')
        ->groupBy('productScale')
        ->get('productScale');

        return view('catalog',compact('products','vendor','scale'));
    }

    public function group(Request $request){
        $gvendor = $request -> productVendor;
        $gscale = $request -> productScale;

        $vendor = DB::table('products')
        ->groupBy('productVendor')
        ->get('productVendor');

        $scale = DB::table('products')
        ->groupBy('productScale')
        ->get('productScale');
        
        if($gvendor == "productVendor" || $gvendor == 0){
            if($gscale == "productScale" || $gscale == 0){
                $products = DB::table('products')->paginate(15);
                // ->get();
            }else{
                $products = DB::table('products')
                ->where('productScale',$gscale)
                ->paginate(15);
            }
        }else{
            if($gscale == "productScale" || $gscale == 0){
                $products = DB::table('products')
                ->where('productVendor',$gvendor)
                ->paginate(15);
            }else{
                $products = DB::table('products')
                ->where('productScale',$gscale)
                ->where('productVendor',$gvendor)
                ->paginate(15);
            }
        }
        
        return view('catalog',compact('products','vendor','scale'));

    }

    public function addorder(Request $request){
        
        $request->validate([
            'quantity' => 'required|numeric|gt:0',
            ],
            [
            'quantity.required' => "please input Buyquantity",
            ]);
        $qty = $request -> qty;
    }
}
