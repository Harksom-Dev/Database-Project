<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class orderController extends Controller
{
    public function index(){
        $order = DB::table('orders')
        -> paginate(10);
        $id = request()->id;
        if($id != null){
            $order = DB::table('orders')
            ->where('orderNumber',$id)
            ->paginate(10);
        }
        // dd($order);
        return view('order',compact('order'));
    }

    public function edit(Request $request){
        $shipD = $request ->reqdate;
        $status = $request -> status;
        $comment = $request -> comment;
        $orderid = $request -> orderid;
        $allstatus = DB::table('orders')
        ->groupBy('status')
        ->get('status');

        return view('edit',compact('shipD','status','comment','allstatus','orderid'));
    }

    public function addedit(Request $request){
        $shipD = $request ->reqdate;
        $status = $request -> status;
        $comment = $request -> comment;
        $orderid = $request -> orderid;
        // dd($orderid);
        DB::table('orders')
        ->where('orderNumber',$orderid)
        ->update(['shippedDate' => $shipD,'status' =>$status,'comments'=>$comment]);


        return redirect()->route('order.index')->with('msg','Edit Complete');
    }
}
