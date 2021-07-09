<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
class GalleryController extends Controller
{
     public function getAllPhotos(){
          $photo = DB::table('photos')->orderBy('id','desc')->paginate(2);
         return view('admin.gallery.photos.index',compact('photo'));


    }

    public function getAddPhotos(){

       return view('admin.gallery.photos.add');
    }



    public function getStorePhotos(Request $request){


        $data=array();
        // $validatedData = $request->validate([
        //  'post_en'=>'required|unique:posts|max:255',
        //  'post_hin'=>'required|unique:posts|max:255',

        // ]);
        
       
        $data['title'] = $request->title;
        $data['type'] = $request->type;
        
        $image= $request->photo;
        if ($image){
            $image_one =uniqid().'.'.$image->getClientOriginalExtension();
             Image::make($image)->resize(500,300)->save('image/photogallery/'.$image_one);
            $data['photo']='image/photogallery/'.$image_one;

        
             DB::table('photos')->insert($data);
        
         

       
        $notification = array(
            'message' =>'Photos Inserted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.photos')->with($notification);
      }else{
           return Redirect()->back();
       } 
    }
    public function getAllVideos(){
         $video = DB::table('videos')->orderBy('id','desc')->paginate(2);
         return view('admin.gallery.videos.index',compact('video'));


    }

    public function getAddVideos(){

       return view('admin.gallery.videos.add');
    }



    public function getStoreVideos(Request $request){
          
         $data=array();
        // $validatedData = $request->validate([
        //  'post_en'=>'required|unique:posts|max:255',
        //  'post_hin'=>'required|unique:posts|max:255',

        // ]);
        
       
        $data['title'] = $request->title;
        $data['type'] = $request->type;
        $data['embed_code'] = $request->embed_code;
        $image= $request->photo;
    

        
             DB::table('videos')->insert($data);
        
         

       
        $notification = array(
            'message' =>'Photos Inserted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.videos')->with($notification);
     
    }
}
