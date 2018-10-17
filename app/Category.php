<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use SoftDeletes;
	protected $fillable = [
	    'name','image','deleted_at'
	];
    protected $dates = ['deleted_at'];


    public function posts(){
        return $this->hasMany('App\Post');
    }
}
