<?php

namespace App\Http\Controllers;

use App\Languages;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index(){
        $lan = new Languages();
        return view('admin.settings.language.index',compact('lan'));
    }
}
