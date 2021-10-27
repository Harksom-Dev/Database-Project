<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\pagination\paginator;
use Carbon\Carbon;

class addProductController extends Controller
{
    function index(){

        $products=DB::table('products')
        ->groupBy('productLine')
        ->get('productLine');
        return view('addProduct',compact('products'));
    }

    public function store(Request $request){

        $request->validate([
            'productCode' => 'required|unique:products|max:15',
            'productName' => 'required|unique:products|max:70',
            'productLine' => 'required',
            'productScale' => 'required',
            'productVendor' => 'required',
            'productDescription' => 'required',
            'buyPrice' => 'required',
            'MSRP' => 'required'
        ]);

        $data = array();
        $data["productCode"] = $request->productCode;
        $data["productName"] = $request->productName;
        $data["productLine"] = $request->productLine;
        $data["productScale"] = $request->productScale;
        $data["productVendor"] = $request->productVendor;
        $data["productDescription"] = $request->productDescription;
        $data["quantityInStock"] = 0;
        $data["buyPrice"] = $request->buyPrice;
        $data["MSRP"] = $request->MSRP;
        
        DB::table('products')->insert($data);
        return redirect()->route('stockin.index')->with('success',"Insert product is successful!");
    }
}
