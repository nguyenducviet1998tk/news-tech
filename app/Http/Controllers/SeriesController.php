<?php

namespace App\Http\Controllers;

use App\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Series = Series::get();
        return response()->json($Series);
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
    public function store(Request $request)
    {
        $input = request()->all(); 
        $Series = Series::create([
            'name'=>$input['name'],
            'slug'=>$input['slug'],
            'description'=>$input['description'],
            'thumbnail'=>$input['thumbnail']
        ]);

        if($Series){
            return response()->json(['Series'=>$Series,'status'=>'success']);
        }else{
            return response()->json(['message'=>"Exitsn't Series",'status'=>'error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Series = Series::find($id);
        if($Series){
            return response()->json(['Series'=>$Series,'status'=>'success']);
        }else{
            return response()->json(['message'=>"Exitsn't Series",'status'=>'error']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function edit(Series $series)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $input = request()->all(); 
        
        $input = request()->all();
        $Series = Series::where('name','=',$input['name'])->get();
        if(count($Series)>0){
            return response()->json(['message'=>"Exits Series",'status'=>'error']);
        }else{
            $Series = Series::where('id',$id)->update([
                'name'=>$input['name'],
                'slug'=>$input['slug'],
                'description'=>$input['description'],
                'thumbnail'=>$input['thumbnail']
            ]);
    
            if($Series){
                return response()->json(['Series'=>$Series,'status'=>'success']);
            }else{
                return response()->json(['message'=>"Exitsn't Series",'status'=>'error']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Series = Series::where('id',$id)->delete();
        if($Series){
            return response()->json(['Series'=>$Series,'status'=>'success']);
        }else{
            return response()->json(['message'=>"Exitsn't Series",'status'=>'error']);
        }
    }
}
