<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Cart;
use Session;

class SiteController extends Controller
{
    public function getHome(){
        $data=[
            'products'=> Product::where('status', 'show')->get()
        ];
        return view('site.home', $data);
    }
    public function getAddCart(Product $product){
        $code = Str::random(6);
        $qty = 3;
        if(Session::get('cartcode')){


        $cart = New Cart;
        $cart->product_id = $product->id;
        $cart->qty = $qty;
        $cart->cost = $product->cost;
        $cart->totalcost = $product->cost*$qty;
        $cart->code = Session::get('cartcode');
        $cart->save();
        }
        else{
            $cart = New Cart;
            $cart->product_id = $product->id;
            $cart->qty = $qty;
            $cart->cost = $product->cost;
            $cart->totalcost = $product->cost*$qty;
            $cart->code = $code;
            $cart->save();
            Session::put('cartcode', $code);
        }

    }
}