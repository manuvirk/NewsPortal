<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
public function adminlogout(){
    Auth::logout();
    return redirect()->route('login')->with('success','successfully logout');
}
}
