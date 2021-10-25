<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class stock_inController extends Controller
{
   function index(){
        $stock_in=DB::table('stock-in')->get();
        return view('stock-in',compact('stock_in'));
   }
}
