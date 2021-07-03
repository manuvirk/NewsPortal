<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    //admin category functions
    public function allCategory(){
        $category = DB::table('categories')->orderBy('id','desc')->paginate(2);
        return view('admin.category.index',compact('category'));

    }

    public function addCategory(){
        return view('admin.category.add');
    }

    public function storeCategory(Request $request){
         $data=array();
        $validatedData = $request->validate([
         'category_en'=>'required|unique:categories|max:255',
         'category_hin'=>'required|unique:categories|max:255',

        ]);
        
       
        $data['category_en'] = $request->category_en;
        $data['category_hin'] = $request->category_hin;

        DB::table('categories')->insert($data);
        $notification = array(
            'message' =>'Category Inserted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.categories')->with($notification);
       
    }

    public function editCategory($id){
        $category = DB::table('categories')->where('id',$id)->first();
       return view('admin.category.edit',compact('category'));
        
    }

    public function updateCategory(Request $request, $id){
        $data = array();
        $data['category_en'] = $request->category_en;
        $data['category_hin'] = $request->category_hin;

        DB::table('categories')->where('id',$id)->update($data);
        $notification = array(
            'message' =>'Category updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.categories')->with($notification);
        

    }





    public function deleteCategory($id){
         $category = DB::table('categories')->where('id',$id)->delete();
         $notification = array(
            'message' =>'Category deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.categories')->with($notification);
        
    }

    
}
