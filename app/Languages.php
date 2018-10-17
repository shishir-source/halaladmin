<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    protected $table ='languages';
    protected $fillable = ['lan_name','lan_code'];
}
