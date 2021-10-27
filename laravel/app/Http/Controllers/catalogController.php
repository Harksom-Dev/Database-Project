<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
class CatalogController extends Controller
{
    
    public function index(){
        //dd(request()->productScale);
        $vendor = DB::table('products')
            ->groupBy('productVendor')
            ->get('productVendor');
    
        $scale = DB::table('products')
        ->groupBy('productScale')
        ->get('productScale');

        if(request()){
            $gvendor = request() -> productVendor;
            $gscale = request() -> productScale;
        
        
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
        }else{
            $products = DB::table('products')
            ->paginate(15);
            // ->get();
            
        }
    
        return view('catalog',compact('products','vendor','scale'));
    }

    public function catalog(Request $request){
        
        if($request){
            $gvendor = $request -> productVendor;
            $gscale = $request -> productScale;
        
        
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
        }else{
            $products = DB::table('products')
            ->paginate(15);
            // ->get();
            
        }
        
        $vendor = DB::table('products')
            ->groupBy('productVendor')
            ->get('productVendor');
    
            $scale = DB::table('products')
            ->groupBy('productScale')
            ->get('productScale');
        return view('catalog',compact('products','vendor','scale'));
    }

    

    
}
