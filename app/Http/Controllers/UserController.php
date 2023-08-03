<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class UserController extends Controller
{
    public function getAddCategory(){
        return view('admin.category.add');
        // dd('hello');
    }
    public function PostAddCategory(Request $request){                     //database save
        // dd($request->title);
        $request->validate(
            [
                'title'=>'required',
                'detail'=>'required'
            ]
            );
        $title=$request->title;
        $photo=$request->photo;
        $detail=$request->detail;
        if($photo){
            $time=md5(time()).'.'.$photo->getClientOriginalExtension();        //md5- encrypte time, getClientOriginalExtension for gettig extension name of photo
                                                                           //to move photo into folder
        $photo->move('site/uploads/category/',$time);
        }
        else{
            $time= Null;
        }

        $categories=new category;
        $categories->title=$title;
        $categories->photo=$time;
        $categories->detail=$detail;
        $categories->save();
        // dd($time);
        return redirect()->route('getManageCategory');//to get to other page after saving data
    }
    // public function getManageCategory(){
    //     $data=[
    //         '$category'=>category::all()
    //     ];
    //     return view('admin.category.manage');
    // }


    public function getManageCategory(){
        return view('admin.category.manage',[
            'categories'=> category::paginate(50)
        ]); //category::all
    }
    public function getDeleteCategory(category $category){//$category bhaneko web.php ko route ko  delete
        // dd();
        $category->delete();
        return redirect()->route('getManageCategory');
    }
    public function getEditCategory(category $category){

        $data=[
            'category'=>$category
        ];
        return view('admin.category.edit',$data);
    }
    public function postEditCategory(Request $request, category $categorys){//edit data
        $photo=$request->file('photo');
        if($photo){
        $time=md5(time()).'.'.$photo->getClientOriginalExtension();
        $photo->move('site/uploads/category/',$time);
        $categorys->title= $request->input('title');
        $categorys->detail= $request->input('detail');
        $categorys->photo= $time;
        $categorys->save();
        }
        else{
            $categorys->title = $request->input('title');
            $categorys->detail = $request->input('detail');
            $categorys->save();
        }
        return redirect()->route('getManageCategory');
    }
}
