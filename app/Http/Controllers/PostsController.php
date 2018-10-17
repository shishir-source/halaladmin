<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        // if($categories->count()==0 || $tags->count()==0 ){
        //     Session::flash('info','You must have a category or tags before adding a post');
        //     return redirect()->back();
        // }

        return view('admin.posts.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'names' => 'required|max:255',
            'featured' => 'required|image',
            'category_id' => 'required',
        ]);


        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$featured_new_name);

        $post = Post::create([
            'name' => $request->names,
            'class' => $request->class,
            'rulling' => $request->rulling,
            'reason' => $request->reason,
            'contents' => $request->contents,
            'featured' => 'uploads/posts/' . $featured_new_name,
            'category_id' => $request->category_id,
            'views' => '0'
        ]);

        // $post->tags()->attach($request->tags);

        Session::flash('success','Post created successfully');
        return redirect()->route('posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.posts.edit')->with('post', $post )->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'contents' => 'required',
            'category_id' => 'required'
        ]);

        $post = Post::find($id);

        if($request->hasFile('featured')){
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('public/uploads/posts',$featured_new_name);
            $post->featured = 'public/uploads/posts/'.$featured_new_name;
        }
        
        $post->name = $request->name;
        $post->class = $request->class;
        $post->rulling = $request->rulling;
        $post->reason = $request->reason;
        $post->contents = $request->contents;
        $post->category_id = $request->category_id;

        $post->save();

        // $post->tags()->sync($request->tags);

        Session::flash('success', 'Post updated successfully.');

        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        Session::flash('success', 'You successfully moved a post to Trahsed.');

        return redirect()->route('posts');
    }
    public function trashed(){
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts',$posts);
    }
    public function kill($id){
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->forceDelete();

        Session::flash('success', 'You successfully deleted a post from trashed.');

        return redirect()->route('posts.trashed');
    }
    public function restore($id){
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();

        Session::flash('success', 'You successfully restored a post from trashed.');

        return redirect()->route('posts');
    }
}
