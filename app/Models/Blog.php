<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    // can be writtem/edited, others will be protected
    protected $fillable = ['title','content'];
    
}
