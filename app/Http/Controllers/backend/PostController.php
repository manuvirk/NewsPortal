<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Image;
class PostController extends Controller
{
     public function addPost(){
         $district = DB::table('districts')->get();
          $category = DB::table('categories')->get();
        return view('admin.post.add',compact('district','category'));

    }


    public function getSubcategory($category_id){
        $subcategory = DB::table('subcategories')->where('category_id',$category_id)->get();

        return response()->json($subcategory);


    }

      public function getSubDistrict($district_id){
        $subdistrict = DB::table('subdistricts')->where('district_id',$district_id)->get();

        return response()->json($subdistrict);


    }
    public function allPost(){
         $post = DB::table('posts')
                 ->join('categories','posts.category_id','categories.id')
                 ->join('subcategories','posts.subcategory_id','subcategories.id')
                 ->join('districts','posts.district_id','districts.id')
                 ->join('subdistricts','posts.subdistrict_id','subdistricts.id')
                 ->select('posts.*','categories.category_en','subcategories.subcategory_en','districts.district_en','subdistricts.subdistrict_en')
                 ->orderby('id','desc')->paginate(3);
                 return view('admin.post.index',compact('post'));
    }

    public function storePost(Request $request){
         $data=array();
        // $validatedData = $request->validate([
        //  'post_en'=>'required|unique:posts|max:255',
        //  'post_hin'=>'required|unique:posts|max:255',

        // ]);
        
       
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['district_id'] = $request->district_id;
       
         $data['subdistrict_id'] = $request->subdistrict_id;
         $data['title_en'] = $request->title_en;
          $data['title_hin'] = $request->title_hin;
          $data['details_en'] = $request->details_en;
          $data['details_hin'] = $request->details_hin;
          $data['tags_en'] = $request->tags_en;
          $data['tags_hin'] = $request->tags_hin;
          $data['headline'] = $request->headline;
          $data['first_section'] = $request->first_section;
          $data['user_id'] = Auth::id();
           $data['section_thumbnail'] = $request->section_thumbnail;
            $data['bigthumbnail'] = $request->bigthumbnail;
              $data['post_date'] = date('d-m-y');
                $data['post_month'] = date("F");
        

       $image= $request->image;
        if ($image){
            $image_one =uniqid().'.'.$image->getClientOriginalExtension();
             Image::make($image)->resize(500,300)->save('image/postimg/'.$image_one);
            $data['Image']='image/postimg/'.$image_one;
             DB::table('posts')->insert($data);
        
         

       
        $notification = array(
            'message' =>'Post Inserted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.posts')->with($notification);
      }else{
           return Redirect()->back();
       } 
    }

    public function editPost($id){
          $post = DB::table('posts')->where('id',$id)->first();
          $district = DB::table('districts')->get();
          $category = DB::table('categories')->get();
       return view('admin.post.edit',compact('post','district','category'));
        
        
    }

     public function updatePost(Request $request, $id){
        $data = array();
       $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['district_id'] = $request->district_id;
       
         $data['subdistrict_id'] = $request->subdistrict_id;
         $data['title_en'] = $request->title_en;
          $data['title_hin'] = $request->title_hin;
          $data['details_en'] = $request->details_en;
          $data['details_hin'] = $request->details_hin;
          $data['tags_en'] = $request->tags_en;
          $data['tags_hin'] = $request->tags_hin;
          $data['headline'] = $request->headline;
          $data['first_section'] = $request->first_section;
          $data['user_id'] = Auth::id();
           $data['section_thumbnail'] = $request->section_thumbnail;
            $data['bigthumbnail'] = $request->bigthumbnail;

         $oldimage = $request->oldimage;
           $image= $request->image;
        if ($image){
            $image_one =uniqid().'.'.$image->getClientOriginalExtension();
             Image::make($image)->resize(500,300)->save('image/postimg/'.$image_one);
            $data['Image']='image/postimg/'.$image_one;
            DB::table('posts')->where('id',$id)->update($data);
          
            unlink($oldimage);
       
        $notification = array(
            'message' =>'Post Updated Successfully',
            'alert-type'=>'success'
        );   
    
        return Redirect()->route('all.posts')->with($notification);
    }
    else{
         $data['Image']= $oldimage;
DB::table('posts')->where('id',$id)->update($data);


       
        $notification = array(
            'message' =>'Post Updated Successfully',
            'alert-type'=>'success'
        );   
    
        return Redirect()->route('all.posts')->with($notification);

    }

    }
    public function deletePost($id){
         $post = DB::table('posts')->where('id',$id)->delete();
         $notification = array(
            'message' =>'subDistrict deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.posts')->with($notification);
        
    }
}
