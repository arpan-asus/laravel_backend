<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function getAddProduct(){
        return view('admin.product.addproduct');
    }
    public function PostAddProduct(Request $request){
        $category=$request->category;
        $title=$request->title;
        $cost=$request->cost;
        $detail=$request->detail;
        $photo=$request->photo;
        if($photo){
            $time=md5(time()).'.'.$photo->getClientOriginalExtension();
        $photo->move('site/uploads/product/',$time);
        }
        else{
            $time= Null;
        }
        $status=$request->status;

        $products=new product;
        $products->category=$category;
        $products->title=$title;
        $products->cost=$cost;
        $products->detail=$detail;
        $products->photo=$time;
        $products->status=$status;
        $products->save();

        return redirect()->route('getManageProduct');
    }
    public function getManageProduct(){
        return view('admin.product.manage',['products'=> product::paginate(15)]);
    }
    public function getDeleteProduct(product $product){
        $product->delete();
        return redirect()->route('getManageProduct');
    }
    public function getEditProduct(Product $product){
        $data=[
            'product'=>$product
        ];
        return view('admin.product.edit',$data);
    }
    public function postEditProduct(Request $request, product $products){//edit data
        $photo=$request->file('photo');
        if($photo){
        $time=md5(time()).'.'.$photo->getClientOriginalExtension();
        $photo->move('site/uploads/product/',$time);
        $products->category=$request->input('category');
        $products->title= $request->input('title');
        $products->cost=$request->input('cost');
        $products->detail= $request->input('detail');
        $products->photo=$time;
        $products->status=$request->input('status');
        $products->save();
        }
        else{
            $products->title = $request->input('title');
            $products->detail = $request->input('detail');
            $products->cost=$cost->input('cost');
            $products->status=$status->input('status');
            $products->save();
        }
        return redirect()->route('getManageProduct');
    }

}
