<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
class AdsController extends Controller
{
     public function getAllAds(){
          $ad = DB::table('ads')->orderBy('id','desc')->paginate(2);
         return view('admin.gallery.ads.index',compact('ad'));


    }

    public function getAddAds(){

       return view('admin.gallery.ads.add');
    }



    public function getStoreAds(Request $request){


        $data=array();
        // $validatedData = $request->validate([
        //  'post_en'=>'required|unique:posts|max:255',
        //  'post_hin'=>'required|unique:posts|max:255',

        // ]);
        
       
        $data['link'] = $request->link;
        $data['type'] = $request->type;

        if($request->type == 1){
        $image= $request->adpic;
      
            $image_one =uniqid().'.'.$image->getClientOriginalExtension();
             Image::make($image)->resize(900,90)->save('image/adgallery/'.$image_one);
            $data['adpic']='image/adgallery/'.$image_one;

        
             DB::table('ads')->insert($data);
        
         

       
        $notification = array(
            'message' =>'Ads Inserted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.ads')->with($notification);
       }else{

           $image= $request->adpic;
      
            $image_one =uniqid().'.'.$image->getClientOriginalExtension();
             Image::make($image)->resize(500,500)->save('image/adgallery/'.$image_one);
            $data['adpic']='image/adgallery/'.$image_one;

        
             DB::table('ads')->insert($data);
        
         

       
        $notification = array(
            'message' =>'vertical Ads Inserted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.ads')->with($notification);
        
       } 
    }
}
