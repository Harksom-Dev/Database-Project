<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class paymentController extends Controller
{
    //
    public function index($id){
        $address = DB::table('customeraddress')
        ->select('addressLine1')
        ->where('primaryaddress',0)
        ->where('customerNumber',$id)
        ->get('addressLine1');

        $address2 = DB::table('customeraddress')
        ->select('addressLine1')
        ->where('primaryaddress',0)
        ->where('customerNumber',$id)
        ->get('addressLine1');
        
        $mainaddr = DB::table('customeraddress')
        ->select('addressLine1')
        ->where('primaryaddress',1)
        ->where('customerNumber',$id)
        ->get('addressLine1');

        // dd($address[0]->addressLine1);
        $mainaddr = $mainaddr[0]->addressLine1;

        return view('payment',compact('address','mainaddr','address2','id'));
    }

    public function store(Request $request){
        $request->validate([
            'cheque' => 'required',
            ],
            [
            'cheque.required' => "please input cheque Number",
            ]);
        
        $date = $request->requiredate;
        if($date != null){
            $date = new Carbon($date);
            if(!$date->isfuture()){
            return redirect()->back()->with('msg','cant ship to the past');
            }
            
        }
        
        $cheque = $request->cheque;
        $reqdate =  $request->requiredate;
        $ship = $request->ship;
        //get address id for shipaddr
        $shipId = DB::table('customeraddress')
        ->select('addressid')
        ->where('addressLine1',$ship)
        ->get();
        $shipId = $shipId[0]->addressid;

        $bill = $request->bill;
        $billId = DB::table('customeraddress')
        ->select('addressid')
        ->where('addressLine1',$bill)
        ->get();
        $billId = $billId[0]->addressid;

        //get order with customer id
        $orderNum = DB::table('orders')
        ->select('orderNumber')
        ->where('customerNumber',$request->id)
        // ->latest('orderNumber');
        ->get();
        //get latest order of this customerid
        $orderNum = DB::table('orders')
        ->select('orderNumber')
        ->latest('orderNumber')
        ->value('orderNumber');

        //update ship and bill addr
        DB::table('orders')
        ->where('orderNumber',$orderNum)
        ->update(['shippedaddressID'=>$shipId,'billAddressID' => $billId]);
        
        //update reqdate to order
        if($reqdate != null){
            DB::table('orders')
        ->where('orderNumber',$orderNum)
        ->update(['requiredDate'=>$reqdate]);
        }
        
        //get ordernum
        $order = DB::table('orderdetails')
        ->select('*')
        ->where('orderNumber',$orderNum)
        ->get();
        $totalprice = 0;
        foreach($order as $order){
            $totalprice += $order->totalAmount;
        }
        //insert data
        $payment = array();
        $payment["customerNumber"] = $request->id;
        $payment["checkNumber"] = $cheque;
        $payment["paymentDate"] = Carbon::now()->todateString();
        $payment["amount"] = $totalprice;
        
        return redirect()->route('catalog')->with('msg','checkin complete');
    }
}
