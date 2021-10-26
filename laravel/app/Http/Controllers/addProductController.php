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
        ->select('products.*')
        ->orderby('products.productCode')
        ->paginate(10);
        return view('addProduct',compact('products'));
    }

    public function store(Request $request){
        $request->validate([
            'productCode' => 'required|unique:promotioncode|max:15',
            'productName' => 'required|unique:promotioncode|max:70',
            'productLine' => 'required',
            'productScale' => 'required',
            'productVendor' => 'required',
            'productDescription' => 'required',
            'quantityInStock' => 'required',
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
    public function delete(Request $request){
        $productNumber= $request->productNumber;
        $employeeNumber= $request->employeeNumber;
        $orderDate= $request->orderDate;
        DB::table('stock-in')
        ->where('productNumber', $productNumber)
        ->where('employeeNumber', $employeeNumber)
        ->where('orderDate', $orderDate)
        ->delete();
        return redirect()->back()->with('success',"delete stock is successful!");
     }
}
