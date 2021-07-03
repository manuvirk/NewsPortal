<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
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
}
