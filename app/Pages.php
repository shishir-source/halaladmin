<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
	
    protected $fillable = [
        'name','header','subheader','body','image'
    ];
}
