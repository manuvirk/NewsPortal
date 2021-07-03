<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class WebsiteController extends Controller
{
    public function getAllWebsites(){
         $website = DB::table('websites')->orderBy('id','desc')->paginate(2);
        return view('admin.websites.index',compact('website'));

    }


     public function getAddWebsites(){

       return view('admin.websites.add');
    }

     public function StoreWebsites(Request $request){
        $data=array();
       
        
       
        $data['name'] = $request->name;
        $data['link'] = $request->link;

        DB::table('websites')->insert($data);
        $notification = array(
            'message' =>'website Inserted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.websites')->with($notification);
       
    }
}
