<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class GalleryController extends Controller
{
     public function getAllPhotos(){
          $photo = DB::table('photos')->orderBy('id','desc')->paginate(2);
         return view('admin.gallery.photos.index',compact('photo'));


    }

    public function getAddPhotos(){

       return view('admin.gallery.photos.add');
    }
    public function getAllVideos(){
         $video = DB::table('videos')->orderBy('id','desc')->paginate(2);
         return view('admin.gallery.videos.index',compact('video'));


    }

    public function getAddVideos(){

       return view('admin.gallery.videos.add');
    }
}
