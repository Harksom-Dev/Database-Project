<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Session;
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
        ->paginate(15);
        // ->get();

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
                $products = DB::table('products')->paginate(15);
                // ->get();
            }else{
                $products = DB::table('products')
                ->where('productScale',$gscale)
                ->paginate(15);
            }
        }else{
            if($gscale == "productScale" || $gscale == 0){
                $products = DB::table('products')
                ->where('productVendor',$gvendor)
                ->paginate(15);
            }else{
                $products = DB::table('products')
                ->where('productScale',$gscale)
                ->where('productVendor',$gvendor)
                ->paginate(15);
            }
        }
        
        return view('catalog',compact('products','vendor','scale'));

    }

    public function addorder(Request $request){
        // $request->validate([
        //     'qty'=>'required|integer|min:0'
        // ]);
        $this->validate($request,[
            'qty' => 'required|numeric|gt:0',
            ],
            [
            'qty.required' => "please input Buyquantity",
            ]);
        $qty = $request -> qty;
    }
}
