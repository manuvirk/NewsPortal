<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
class ExtraController extends Controller
{
    public function hindiLang(){
        Session::get('lang');
        Session()->forget('lang');
        Session()->put('lang','hindi');
        return redirect()->back();


    }

    public function englishLang(){
        Session::get('lang');
        Session()->forget('lang');
        Session()->put('lang','english');
        return redirect()->back();

    }


    public function singlePost($id){
        $postdata = DB::table('posts')
                   ->join('categories','posts.category_id','categories.id')
                   ->join('subcategories','posts.subcategory_id','subcategories.id')
                   ->join('users','posts.user_id','users.id')
                   ->select('posts.*','categories.category_en','categories.category_hin','subcategories.subcategory_en','subcategories.subcategory_hin','users.name')
                   ->where('posts.id',$id)->first();
                   return view('main.single_post',compact('postdata'));
    }



    public function catpost($id, $category_en){
        $catpost = DB::table('posts')->where('category_id',$id)->orderBy('id','desc')->paginate(3);

        return view('main.allpost',compact('catpost'));



    }


    public function subcatpost($id, $subcategory_en){
        $subcatpost = DB::table('posts')->where('subcategory_id',$id)->orderBy('id','desc')->paginate(3);

        return view('main.subpost',compact('subcatpost'));



    }


    public function subdistrictfront($district_id){
        $subdistrict = DB::table('subdistricts')->where('district_id',$district_id)->get();

        return response()->json($subdistrict);


    }



    public function searchdistrict(Request $request){

        $districtid = $request->district_id;
        $subdistrictid = $request->subdistrict_id;
       $catpost = DB::table('posts')->where('district_id',$districtid)
       ->where('subdistrict_id',$subdistrictid)->orderBy('id','desc')->paginate(3);

        return view('main.allpost',compact('catpost'));

    }
}
