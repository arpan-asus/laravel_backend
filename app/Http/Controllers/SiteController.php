<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Cart;
use App\Models\manageshipping;
use App\Models\Order;
use Session;

class SiteController extends Controller
{
    public function getHome(){
        $data=[
            'products'=> Product::where('status', 'show')->get()
        ];
        return view('site.home', $data);
    }

    public function getCart(){
        if(Session::get('cartcode'))
        {
            $carcode = Session::get('cartcode');
            $data =[
                'carts' => Cart::where('code', $carcode)->get()
            ];
            return view('site.carts', $data);
        }
        else{
            abort(404);
        }
    }
    public function getAddCart(Product $product){
        $code = Str::random(6);
        $qty = 3;
        $qty = 1;
        if(Session::get('cartcode')){//cartcode session ma xa bhaney if


        $cart = New Cart;
        $cart->product_id = $product->id;
        $cart->qty = $qty;
        $cart->cost = $product->cost;
        $cart->totalcost = $product->cost*$qty;
        $cart->code = Session::get('cartcode');
        $cart->save();

        }
        else{   //yedi session ma cartcode xaina bhaney

            $cart = New Cart;
            $cart->product_id = $product->id;
            $cart->qty = $qty;
            $cart->cost = $product->cost;
            $cart->totalcost = $product->cost*$qty;
            $cart->code= $code;
            $cart->save();
            Session::put('cartcode', $code);//session ma cartcode rakhni
        }
        return redirect()->route('getCart');

    }
    public function deletecart(Cart $id){
            if(Session::get('cartcode')==$id->code){
                $id->delete();
                return redirect()->route('getCart');
            }
            else{
                dd('this cart not belong you');
            }
        }
    public function getCheckout()
        {
            $data =[
                'shippings' => manageshipping::where('Status', 'show')->get(),
                'carts' => Cart::where('code', Session::get('cartcode'))->get(),
                'subtotal' => Cart::where('code', Session::get('cartcode'))->sum('totalcost')
            ];
            return view ('site.checkout', $data);
        }
    public function postAjax(Request $request){
        $shippingid = $request->get('shipping');
        //$shippinginfo = manageshipping::where('id', $shippingid)->limit(1)->first();//jun select garni tei wala ko lagi
        $shippinginfo = manageshipping::find($shippingid);//direct id select garna
        $code = Session::get('code');

        $totalamount = Cart::where('code', $code)->sum('totalcost');
        $grandtotal = $shippinginfo->charge +$totalamount;
        return response(['totalamount' => $totalamount, 'grandtotal' => $grandtotal, 'shippingcost'=> $shippinginfo->charge]);

    }
    public function postAddOrder(Request $request){
        $cartcode= Session::get('cartcode');
        $name=$request->name;
        $address=$request->address;
        $zipcode=$request->zipcode;
        $email=$request->email;
        $contactnumber=$request->number;
        $area_id=$request->shipping;
        $payment_type=$request->paymentmethod;

        $product_cost = Cart::where('code', $cartcode)->sum('totalcost');
        $shippinginfo = manageshipping::find($area_id);
        $shipping_cost= $shippinginfo->charge;
        $grand_total= $product_cost+$shipping_cost;
        // $payment_status
        $details= new order;
        $details->cartcode=$cartcode;
        $details->name=$name;
        $details->address=$address;
        $details->email=$email;
        $details->number=$contactnumber;
        $details->area_id=$zipcode;
        if ($details->paymenttype == 'esewa')
        {
           if( $details->paymentstatus='Paid'){
            $details->paymenttype=$payment_type;
           }
        }
        $details->productcost=$product_cost;
        $details->shippingcost=$shipping_cost;
        $details->grandtotal=$grand_total;
        $details->save();

        return view('site.preview');


    }
}

