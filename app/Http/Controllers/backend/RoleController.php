<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Hash;
class RoleController extends Controller
{
    public function addwriter(){
        return view('admin.role.add');
    }

    public function allwriter(){
         $userdata = DB::table('users')->where('type',0)->get();
        return view('admin.role.index', compact('userdata'));
    }

    public function storewriter(Request $request){
        $data = array();
        $data['name']= $request->name;
        $data['email']= $request->email;
        $data['password']= Hash::make($request->password);
        $data['website']= $request->website;
        $data['gallery']= $request->gallery;
        $data['setting']= $request->setting;
        $data['category']= $request->category;
        $data['district']= $request->district;
        $data['post']= $request->post;
        $data['role']= $request->role;
        $data['ads']= $request->ads;
       $data['type']= 0;
       
       //return response()->json($data);
        DB::table('users')->insert($data);
        $notification = array(
            'message' =>'writer Inserted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('add.writer')->with($notification);
        
    }

    public function editwriter($id){
        $writer = DB::table('users')->where('id',$id)->first();
        return view('admin.role.edit',compact('writer'));


    }

    public function updatewriter(Request $request, $id){

       $data = array();
        $data['name']= $request->name;
        $data['email']= $request->email;
       
        $data['website']= $request->website;
        $data['gallery']= $request->gallery;
        $data['setting']= $request->setting;
        $data['category']= $request->category;
        $data['district']= $request->district;
        $data['post']= $request->post;
        $data['role']= $request->role;
        $data['ads']= $request->ads;
      DB::table('users')->where('id',$id)->update($data);

      $notification = array(
            'message' =>'writer updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('allwriter')->with($notification);

    }
}
