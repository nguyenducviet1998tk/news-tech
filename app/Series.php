<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $fillable = [
        'name','description','thumbnail','slug',
    ];

    public function posts(){
    	return $this->hasMany('App\Post');
    }
}
