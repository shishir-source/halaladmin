<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;

class FrontEndController extends Controller
{
    public function index(){
        return view('index')
        ->with('title', Setting::first()->site_name)
        ->with('categories', Category::take(4)->get())
        ->with('first_post', Post::orderBy('created_at', 'desc')->first() )
        ->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first() )
        ->with('third_post', Post::orderBy('created_at', 'desc')->get()->first());
    }
}
