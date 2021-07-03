<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class DistrictController extends Controller
{
    
     //admin District functions
    public function allDistrict(){
        $district = DB::table('districts')->orderBy('id','desc')->paginate(2);
        return view('admin.district.index',compact('district'));


    }

    public function addDistrict(){
         return view('admin.district.add');
           
    }

    public function storeDistrict(Request $request){
         $data=array();
        $validatedData = $request->validate([
         'district_en'=>'required|unique:districts|max:255',
         'district_hin'=>'required|unique:districts|max:255',

        ]);
        
       
        $data['district_en'] = $request->district_en;
        $data['district_hin'] = $request->district_hin;

        DB::table('districts')->insert($data);
        $notification = array(
            'message' =>'District Inserted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.districts')->with($notification);
       
    }

  

    public function editDistrict($id){
         $district = DB::table('districts')->where('id',$id)->first();
       return view('admin.district.edit',compact('district'));
        
        
    }


     public function updateDistrict(Request $request, $id){
        $data = array();
        $data['district_en'] = $request->district_en;
        $data['district_hin'] = $request->district_hin;

        DB::table('districts')->where('id',$id)->update($data);
        $notification = array(
            'message' =>'District updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.districts')->with($notification);
        

    }

    public function deleteDistrict($id){

         $district = DB::table('districts')->where('id',$id)->delete();
         $notification = array(
            'message' =>'Category deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.districts')->with($notification);
    }
}
