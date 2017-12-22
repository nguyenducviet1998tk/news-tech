<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::get();
        return response()->json($post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $input = request()->all(); 
        
        $post = Post::create([
            'title'=>$input['title'],
            'description'=>$input['description'],
            'content'=>$input['content'],
            'thumbnail'=>$input['thumbnail'],
            'series_id'=>$input['series_id'],
            'user_id'=>$input['user_id']
        ]);

        if($post){
            return response()->json(['post'=>$post,'status'=>'success']);
        }else{
            return response()->json(['message'=>"Exitsn't post",'status'=>'error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if($post){
            return response()->json(['post'=>$post,'status'=>'success']);
        }else{
            return response()->json(['message'=>"Exitsn't post",'status'=>'error']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $input = request()->all(); 
        
        $post = Post::where('id',$id)->update([
            'title'=>$input['title'],
            'description'=>$input['description'],
            'content'=>$input['content'],
            'thumbnail'=>$input['thumbnail'],
            'series_id'=>$input['series_id'],
            'user_id'=>$input['user_id']
        ]);
        
        if($post){
            return response()->json(['post'=>$post,'status'=>'success']);
        }else{
            return response()->json(['message'=>"Exitsn't post",'status'=>'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::where('id',$id)->delete();
        if($post){
            return response()->json(['post'=>$post,'status'=>'success']);
        }else{
            return response()->json(['message'=>"Exitsn't post",'status'=>'error']);
        }
    }
}
