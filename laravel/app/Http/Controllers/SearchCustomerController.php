<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Model\Customer;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;


class SearchCustomerController extends Controller
{
    function index(){
        
        $q = Input::get('q');
        $user = Customer::where('customerName', 'LIKE', '%'.$q.'%') -> orWhere('customerNumber', 'LIKE', '%'.$q.'%') -> get();
        if(count($customers) > 0 ){
            return view('welcome')->withDetails($user)->withQuery ( $q );
        } 
        else{
            return view ('welcome')->withMessage('No Details found. Try to search again !');
        } 
    }

}