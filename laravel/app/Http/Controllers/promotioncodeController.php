<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\pagination\paginator;
use Carbon\Carbon;


class promotioncodeController extends Controller
{
    //

    function index(){
        $promotioncode=DB::table('promotioncode')
        ->paginate(10);
        return view('promotioncode',compact('promotioncode'));
    }

    public function store(Request $request){
        $request->validate([
            'codeID' => 'required|unique:promotioncode|max:11',
            'discount' => 'required',
            'expDate' => 'required',
            'description' => 'required'
        ]);
        $date = $request->expDate;
        $date = new Carbon($date);
        if(!$date->isfuture()){
        return redirect()->back()->with('msg','Expired Date can not set to the past');
        }
            
        
        $data = array();
        $data["codeID"] = $request->codeID;
        $data["expDate"] = $request->expDate;
        $data["discount"] = $request->discount;
        $data["description"] = $request->description;
        
        DB::table('promotioncode')->insert($data);
        return redirect()->route('promotion.index')->with('success',"Insert product is successful!");
    }
    public function delete(Request $request){
        $id= $request->codeID;
        DB::table('promotioncode')
        ->where('codeID', $id)
        ->delete();
        return redirect()->back()->with('success',"delete stock is successful!");
     }

}
