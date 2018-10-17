<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Category;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name','contents','category_id','featured','class','rulling','reason','views','deleted_at'
    ];

    public function getFeaturedAttribute( $featured){
        return asset($featured);
    }

    protected $dates = ['deleted_at'];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    // public function tags(){
    //     return $this->belongsToMany('App\Tag');
    // }

    //For APi
    public  function categoryById($id)
    {
        return Category::find($id)->name;
        //return $this->belongsTo('App\Author');
    }

    public  static function getPostByCategory($id)
    {
        //return DB::table('books')->where('author_id', $id)->get();
        return Post::where('category_id', $id)->get();
    }
}
