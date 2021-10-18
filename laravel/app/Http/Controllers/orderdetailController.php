<?php

namespace App\Http\Controllers;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
class orderdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'quantity' => 'required|numeric|gt:0',
            ],
            [
            'quantity.required' => "please input Buyquantity",
            ]);
        $quantity = $request -> quantity;
        $productcode = $request -> productCode;

        $curqty = DB::table('products')
        ->select('quantityInStock')
        ->where('productCode',$productcode)
        ->value('quantityInStock');
        if($quantity > $curqty){
            return redirect()->back()->with('msg','you cant buy more than this product quantity');
            
        }
        
        $product = DB::table('products')
        ->where('productCode',$productcode)
        ->get();

        foreach ($product as $product) {
            $product = $product;
            }
        $product -> quantityInStock = $quantity;

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product,$product->productCode);

        $request->session()->put('cart',$cart);
        //dd($request ->session()->get('cart'));
        return redirect()->route('catalog');

        // add to orderdetail 
        $last_row=DB::table('orderdetails')->orderBy('orderNumber', 'DESC')->first();
        $last_row = $last_row->orderNumber;
        dd($last_row);
    }


    public function test(Request $request){
        dd($request ->session()->get('cart'));
    }

    public function test2(Request $request){
        $cart = new Cart(null);
        $request->session()->put('cart',$cart);
        return redirect()->route('catalog');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
