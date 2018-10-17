<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pages;
use DB;
use Session;

class PageSetupController extends Controller
{
    public function pageSetup($id){
    	
    	if($id == "about" ){
    		$about = DB::table('pages')->where('id', 1)->get();
    		return view('admin.settings.about.index',compact('about'))->with('name', $id);
    	}
    	elseif ($id == "feature") {
    		$feature = DB::table('pages')->where('id', 2)->get();
    		return view('admin.settings.about.index',compact('feature'))->with('name', $id);
    	}
    	elseif ($id == "source") {
    		$source = DB::table('pages')->where('id', 3)->get();
    		return view('admin.settings.about.index',compact('source'))->with('name', $id);
    	}
    }

    public function aboutSetup(Request $request)
    {	
    	$about = Pages::where('id', 1)->first();

    	$about->name = $request->name;
    	$about->header = $request->header;
    	$about->subheader = $request->subheader;
    	$about->body = $request->body;

    	if($request->hasFile('image')){
    	    $image = $request->image;
    	    $image_new_name = time().$image->getClientOriginalName();
    	    $image->move('public/uploads/about',$image_new_name);
    	    $about->image = 'public/uploads/about/'.$image_new_name;
    	}
    	$about->save();

    	Session::flash('success', 'About page updated successfully.');

    	return redirect()->route('pages',['id' => 'about'])	;
    }

 	public function sourceSetup(Request $request)
    {	
    	$source = Pages::where('id', 3)->first();

    	$source->name = $request->name;
    	$source->header = $request->header;
    	$source->subheader = $request->subheader;
    	$source->body = $request->body;

    	if($request->hasFile('image')){
    	    $image = $request->image;
    	    $image_new_name = time().$image->getClientOriginalName();
    	    $image->move('public/uploads/source',$image_new_name);
    	    $source->image = 'public/uploads/source/'.$image_new_name;
    	}
    	$source->save();

    	Session::flash('success', 'Source page updated successfully.');
    	
    	return redirect()->route('pages',['id' => 'source'])	;
    }

    public function featureSetup(Request $request)
    {	
    	$feature = Pages::where('id', 2)->first();

    	$feature->name = $request->name;
    	$feature->header = $request->header;
    	$feature->subheader = $request->subheader;
    	$feature->body = $request->body;

    	if($request->hasFile('image')){
    	    $image = $request->image;
    	    $image_new_name = time().$image->getClientOriginalName();
    	    $image->move('public/uploads/feature',$image_new_name);
    	    $feature->image = 'public/uploads/feature/'.$image_new_name;
    	}
    	$feature->save();

    	Session::flash('success', 'Feature page updated successfully.');
    	
    	return redirect()->route('pages',['id' => 'feature'])	;
    }
}
