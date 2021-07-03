<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SubDistrictController extends Controller
{
     //admin subdistrict 
    



    public function allSubDistrict(){
        $subdistrict = DB::table('subdistricts')
                 ->join('districts','subdistricts.district_id','districts.id')
                 ->select('subdistricts.*','districts.district_en')
        ->orderBy('id','desc')->paginate(2);
        return view('admin.subdistrict.index',compact('subdistrict'));

    }

    public function addSubDistrict(){
         $district = DB::table('districts')->get();
        return view('admin.subdistrict.add',compact('district'));
        
    }

    public function storeSubDistrict(Request $request){
         $data=array();
        $validatedData = $request->validate([
         'subdistrict_en'=>'required|unique:subdistricts|max:255',
         'subdistrict_hin'=>'required|unique:subdistricts|max:255',

        ]);
        
       
        $data['subdistrict_en'] = $request->subdistrict_en;
        $data['subdistrict_hin'] = $request->subdistrict_hin;
        $data['district_id'] = $request->district_name;
        DB::table('subdistricts')->insert($data);
        $notification = array(
            'message' =>'subDistrict Inserted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.subdistricts')->with($notification);
        
    }

    public function editSubDistrict($id){
          $subdistrict = DB::table('subdistricts')->where('id',$id)->first();
          $district = DB::table('districts')->get();
       return view('admin.subdistrict.edit',compact('subdistrict','district'));
        
        
    }

     public function updateSubDistrict(Request $request, $id){
        $data = array();
        $data['subdistrict_en'] = $request->subdistrict_en;
        $data['subdistrict_hin'] = $request->subdistrict_hin;
        $data['district_id'] = $request->district_name;
        DB::table('subdistricts')->where('id',$id)->update($data);
        $notification = array(
            'message' =>'District updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.subdistricts')->with($notification);
        

    }
    public function deleteSubDistrict($id){
         $subdistrict = DB::table('subdistricts')->where('id',$id)->delete();
         $notification = array(
            'message' =>'subDistrict deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.subdistricts')->with($notification);
        
    }
}

