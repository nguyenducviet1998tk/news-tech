<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'title', 'slug', 'description', 'content','published','type','data','thumbnail','series_id',
    ];
 	
 	public function user(){
 	   	return $this->belongsTo('App\User','user_id');
    }
    public function series(){
    	return $this->belongsTo('App\Series');
    }
}
