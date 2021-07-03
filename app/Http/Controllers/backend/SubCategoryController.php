<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class SubCategoryController extends Controller
{
    //
     //admin category functions



    public function allSubCategory(){
        $subcategory = DB::table('subcategories')
                 ->join('categories','subcategories.category_id','categories.id')
                 ->select('subcategories.*','categories.category_en')
        ->orderBy('id','desc')->paginate(2);
        return view('admin.subcategory.index',compact('subcategory'));

    }

    public function addSubCategory(){
         $category = DB::table('categories')->get();
        return view('admin.subcategory.add',compact('category'));
        
    }

    public function storeSubCategory(Request $request){
         $data=array();
        $validatedData = $request->validate([
         'subcategory_en'=>'required|unique:subcategories|max:255',
         'subcategory_hin'=>'required|unique:subcategories|max:255',

        ]);
        
       
        $data['subcategory_en'] = $request->subcategory_en;
        $data['subcategory_hin'] = $request->subcategory_hin;
        $data['category_id'] = $request->category_name;
        DB::table('subcategories')->insert($data);
        $notification = array(
            'message' =>'subCategory Inserted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.subcategories')->with($notification);
        
    }

    public function editSubCategory($id){
          $subcategory = DB::table('subcategories')->where('id',$id)->first();
          $category = DB::table('categories')->get();
       return view('admin.subcategory.edit',compact('subcategory','category'));
        
        
    }

     public function updateSubCategory(Request $request, $id){
        $data = array();
        $data['subcategory_en'] = $request->subcategory_en;
        $data['subcategory_hin'] = $request->subcategory_hin;
        $data['category_id'] = $request->category_name;
        DB::table('subcategories')->where('id',$id)->update($data);
        $notification = array(
            'message' =>'Category updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.subcategories')->with($notification);
        

    }
    public function deleteSubCategory($id){
         $subcategory = DB::table('subcategories')->where('id',$id)->delete();
         $notification = array(
            'message' =>'subCategory deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.subcategories')->with($notification);
        
    }
}
