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

    public function showtest(){
        $products = DB::table('products')
        ->select('productCode','productName','productLine','productScale','productVendor','productDescription','buyPrice','MSRP')
        ->orderBy('productVendor')
        ->get();
        return view('catalog',['product' => $products]);
    }

    public function mulAccestest($id){
        $products = DB::table('products')
        ->select('productCode','productName','productLine','productScale','productVendor','productDescription','buyPrice','MSRP')
        ->orderBy('productVendor')
        ->get();
        $employees = DB::table('employees')
        ->select('employeeNumber','lastName','firstName')
        ->where('employeeNumber',$id)
        ->get();
        return view('catalog',['product' => $products,'employee' => $employees]);
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
