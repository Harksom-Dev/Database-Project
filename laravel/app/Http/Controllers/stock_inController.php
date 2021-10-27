<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\pagination\paginator;
use Carbon\Carbon;

class stock_inController extends Controller
{
   function index(){
      $stock_in=DB::table('stock-in')
      ->join('products','stock-in.productNumber','products.productCode')
      ->select('stock-in.*','products.productName')
      ->orderby('stock-in.orderDate')
      ->paginate(10);
      return view('stock-in',compact('stock_in'));
   }

   public function store(Request $request){
      $request->validate([
         'productNumber' => 'required|max:8',
         'employeeNumber' => 'required|max:4',
         'orderDate' => 'required',
         'amountOfProduct' => 'required',
      ]);
      $stockNum=DB::table('stock-in')
      ->select('stockId')
      ->latest('stockId')
      ->value('stockId');

      $data = array();
      $data["stockId"] = $stockNum+1;
      $data["productNumber"] = $request->productNumber;
      $data["employeeNumber"] = $request->employeeNumber;
      $data["orderDate"] = $request->orderDate;
      $data["amountOfProduct"] = $request->amountOfProduct;
      $data["last_Modified"] = Carbon::now()->todateString();
      //create variable for check 
      $products = DB::table('products')
      ->select('*')
      ->where('productCode',$request->productNumber)
      ->get();
      // dd($products);
      $employees = DB::table('employees')
      ->select('*')
      ->where('employeeNumber',$request->employeeNumber)
      ->get();

      //check if it's null or not
      if($employees->isEmpty()){
         return redirect()->back()->with('employee','Employee number is incorrect');
      }else if($products->isEmpty()){
         return redirect()->route('addproduct')->with('noproduct','This product does not exist,please create new product');
      }else{
         $qty=DB::table('products')
         ->select('quantityInStock')
         ->where('productCode',$request->productNumber)
         ->value('quantityInStock');
         $qty+=$request->amountOfProduct;
         DB::table('stock-in')->insert($data);
         DB::table('products')
         ->where('productCode',$request->productNumber)
         ->update(['quantityInStock'=>$qty]);
      }
      return redirect()->back()->with('success',"Insert stock is successful!");
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

