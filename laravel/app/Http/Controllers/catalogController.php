<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CatalogController extends Controller
{
    public function catalog()
    {
        $products = DB::table('products')->get();
        return $products;
    }

    public function showtest(Request $request){
        $products = DB::table('products')
        ->get();

        $vendor = DB::table('products')
        ->groupBy('productVendor')
        ->get('productVendor');

        $scale = DB::table('products')
        ->groupBy('productScale')
        ->get('productScale');

        return view('catalog',compact('products','vendor','scale'));
    }

    public function mulAccestest(){
        $products = DB::table('products')
        ->get();

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
                $products = DB::table('products')
                ->get();
            }else{
                $products = DB::table('products')
                ->where('productScale',$gscale)
                ->get();
            }
        }else{
            if($gscale == "productScale" || $gscale == 0){
                $products = DB::table('products')
                ->where('productVendor',$gvendor)
                ->get();
            }else{
                $products = DB::table('products')
                ->where('productScale',$gscale)
                ->where('productVendor',$gvendor)
                ->get();
            }
        }
        return view('catalog',compact('products','vendor','scale'));

    }

    public function addorderDetail(Request $request){
        $products = DB::table('products')
        ->select('productCode','productName','productLine','productScale','productVendor','productDescription','buyPrice','MSRP')
        ->orderBy('productVendor')
        ->get();
        dd($request);
        // $request->validate([
        //     'quantity' => 'required'
        // ]);
        // $orderdetails -> quantityOrdered = $request -> quantity;
        // $orderdetails -> productCode = $products -> productCode;

    

    }
}
