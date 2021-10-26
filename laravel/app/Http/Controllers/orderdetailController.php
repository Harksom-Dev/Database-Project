<?php

namespace App\Http\Controllers;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;
class orderdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!session::has('cart')){
            return view('test');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $items = $cart->items;
        $totalprice = $cart->totalPrice;
        $totalqty = $cart->totalQty;
        
        

        return view('cart',compact('items','totalprice','totalqty'));
    }

    public function test(Request $request){
        dd($request ->session()->get('cart'));
        
        //return $request;
    }

    public function test2(Request $request){
        $cart = new Cart(null);
        $request->session()->put('cart',$cart);
        return redirect()->route('catalog');
    }

    public function remove(Request $request){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $name = $request->name;
        $id = $request->id;
        
        $cart->remove($id);

        $request->session()->put('cart',$cart);

        //dd($request ->session()->get('cart'));

        // return redirect()->route('cart.index');
        return redirect()->back();
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
        if($cart ->items != null){
            foreach($cart->items as $data){
                $qty =  DB::table('products')
                ->select('quantityInstock')
                ->where('productCode',$data['id'])
                ->value('quantityInstock');
                
                if($qty < $data['qty']+$quantity){
                    return redirect()->back()->with('msg','you cant buy more than this product quantity please checkin to check');
                }
                
            }
        }
        

        $cart->add($product,$product->productCode);
        
        $request->session()->put('cart',$cart);
        //dd($request ->session()->get('cart'));
        return redirect()->route('catalog');

        
    }
    public function order(Request $request){
        //validate customerNumber
        $request->validate([
            'customerNumber' => 'required|numeric|gt:0',
            ],
            [
            'customerNumber.required' => "please input customerNumber",
            ]);
        //get customer detail
        $customer = DB::table('customers')
        ->select('*')
        ->where('customerNumber',$request->customerNumber)
        ->get();
        
        //check if it's null or not
        if($customer->isEmpty()){
            return redirect()->back()->with('msg','This customer is not a member');
        }
        //get discount
        $discoutcode = $request->code;
        if($discoutcode != null){
            $curdis = DB::table('promotioncode')
            ->select('discount')
            ->where('codeID',$discoutcode)
            ->value('discount');
            //check discount in db
            if($curdis == null){
                return redirect()->back()->with('msg','This Code is unvalid');
            }
            //check expired date
            $exptime = DB::table('promotioncode')
            ->select('expDate')
            ->where('codeID',$discoutcode)
            ->get();
            $test = json_decode($exptime);
            $exptime = $test[0]->expDate;
            $expd = new Carbon($exptime);
            if(!$expd->isfuture()){
                return redirect()->back()->with('msg','This Code is expired');
            }
        }else{
            $curdis = 0;
        }
        

        //get cart from session
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        foreach($cart->items as $data){
            $qty =  DB::table('products')
            ->select('quantityInstock')
            ->where('productCode',$data['id'])
            ->value('quantityInstock');
            
            $qty -= $data['qty'];
            // dd($data['id']);
            if($qty <0){
                $qty = 0;
            }

            DB::table('products')
            ->where('productCode',$data['id'])
            ->update(['quantityInstock'=>$qty]);
        }
        //get total price
        $totalprice = $cart->totalPrice - $curdis;
        if($totalprice < 0){
            $totalprice = 0;
        }
        //call total point earn
        $pointEarn = $totalprice / 100;
        //get latest ordernumber
        $orderNum = DB::table('orders')
        ->select('orderNumber')
        ->latest('orderNumber')
        ->value('orderNumber');
        // $curDate = Carbon::now()->todateString();
        //orders table data
        $orders = array();
        $orders["orderNumber"] = $orderNum+1;
        $orders["orderDate"] = Carbon::now()->todateString();
        $orders["requiredDate"] = Carbon::now()->addDays(10)->todateString();             //check again in payment normal is +10 days
        $orders["shippedDate"] = Carbon::now()->addDays(10)->todateString();              //employee will edit later now with the same normal required date
        $orders["shippedaddressID"] = 0;
        $orders["billAddressID"] = 0;
        $orders["status"] = "in Process";
        $orders["comments"] = "";
        $orders["customerNumber"] = $request->customerNumber;
        $orders["pointEarn"] = $pointEarn;
        //dd($orders);
        //insert to orderstable
        DB::table('orders')->insert($orders);

        //orderdetail data
        $orderNum = DB::table('orders')
        ->select('orderNumber')
        ->latest('orderNumber')
        ->value('orderNumber');
        $detail = array();
        //insert orderdetail each product in cart
        foreach($cart->items as $data){
            $detail["orderNumber"] = $orderNum;
            $detail["productCode"] = $data['item']->productCode;
            $detail["quantityOrdered"] =$data['qty'];
            $detail["priceEach"] = $data['item']->MSRP;
            $detail["orderLineNumber"] = 1;         // line in supermarket?   
            $detail["statusID"] = 0;                //not sure
            $detail["totalAmount"] = $data['price'];
            
            // $detail[$i] = $data['qty'];
            DB::table('orderdetails')->insert($detail);
            $detail = array();
        }

        //update point in customer
        $customerPoint = DB::table('customers')          // get customer point
        ->select('TotalPoint')
        ->where('customerNumber',$request->customerNumber)
        ->value('TotalPoint');
        
        $customerPoint += $pointEarn;
        

        DB::table('customers')
        ->where('customerNumber',$request->customerNumber)
        ->update(['TotalPoint'=>$customerPoint]);


        //update product quantity
        

        //set cart to null
        $cart = new Cart(null);
        $request->session()->put('cart',$cart);

        return redirect()->route('payment',['id'=>$request->customerNumber]);
    }
}
