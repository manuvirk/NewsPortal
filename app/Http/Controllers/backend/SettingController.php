<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class SettingController extends Controller
{
    public function getSocials(){
        $socials = DB::table('socials')->get()->first();
        return view('admin.settings.social',compact('socials'));

    }

    public function updateSocials(Request $request, $id ){
        $data = array();
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['youtube'] = $request->youtube;
        $data['LinkedIn'] = $request->LinkedIn;
        $data['instagram'] = $request->instagram;
       

        DB::table('socials')->where('id',$id)->update($data);
        $notification = array(
            'message' =>'socials updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.socials')->with($notification);
        
        
    }

    public function getSeos(){
         $seos = DB::table('seos')->get()->first();
        return view('admin.settings.seo',compact('seos'));
    }


    public function updateSeos(Request $request, $id){
        $data = array();
        $data['meta-author'] = $request->metaauthor;
        $data['meta-title'] = $request->metatitle;
        $data['meta-keyword'] = $request->metakeyword;
        $data['meta-description'] = $request->metadescription;
        $data['google-analytics'] = $request->googleanalytics;
       $data['google-verification'] = $request->googleverification;
        $data['alexa-analytics'] = $request->alexaanalytics;

        DB::table('socials')->where('id',$id)->update($data);
        $notification = array(
            'message' =>'socials updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.seos')->with($notification);
        

    }
    public function getLivetvs(){
         $livetvs = DB::table('live_tvs')->get()->first();
        return view('admin.settings.livetv',compact('livetvs'));
        
    }


    
    public function updateLivetvs(Request $request, $id){
        $data = array();
        $data['embed_code'] = $request->embed_code;
        $data['status'] = $request->status;
        
        DB::table('live_tvs')->where('id',$id)->update($data);
        $notification = array(
            'message' =>'livetv updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.livetvs')->with($notification);
        

    }

    public function getNotices(){
        $notices = DB::table('notices')->get()->first();
        return view('admin.settings.notice',compact('notices'));
    }


    
    public function updateNotices(Request $request, $id){
        $data = array();
        $data['notice'] = $request->notice	;
        $data['status'] = $request->status;
        
        DB::table('notices')->where('id',$id)->update($data);
        $notification = array(
            'message' =>'notices updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.notices')->with($notification);
        

    }
}