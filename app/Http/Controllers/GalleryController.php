<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function getAddGallery(){
        return view('admin.Gallery.gallery');
    }
    public function getPostGallery(Request $request){
        $request->validate(
            [
                'title'=>'required'
            ]
            );
        $title=$request->title;
        $photo=$request->photo;
        if($photo){
            $time=md5(time()).'.'.$photo->getClientOriginalExtension();
        $photo->move('site/uploads/gallery/',$time);
        }
        else{
            $time= Null;
        }
        $gallery=new Gallery;
        $gallery->title=$title;
        $gallery->photo=$time;
        $gallery->save();

        return redirect()->route('getManageGallery');
    }
    public function getManageGallery(){
        return view('admin.Gallery.manage',[
            'galleries'=> gallery::paginate(50)
        ]);
    }
    public function getDeleteGallery(gallery $gallery){
        $gallery->delete();
        return redirect()->route('getManageGallery');
    }
    public function getEditProduct(gallery $gallery){
        $data=[
            'gallery'=>$gallery
        ];
        return view('admin.gallery.edit',$data);
}
public function postEditGallery(Request $request, gallery $gallery){
    $photo=$request->file('photo');
    if($photo){
    $time=md5(time()).'.'.$photo->getClientOriginalExtension();
    $photo->move('site/uploads/gallery/',$time);
    $gallery->title= $request->input('title');
    $gallery->photo= $time;
    $gallery->save();
    }
    else{
        $gallery->title = $request->input('title');
        $gallery->save();
    }
    return redirect()->route('getManageGallery');
}
}
