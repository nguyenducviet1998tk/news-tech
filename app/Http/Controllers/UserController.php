<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Crypt;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * login
     */
    public function login(){
        $input = request()->all();
        $email = $input['email'];
        $password = $input['password'];
        $user = User::where('email',$email)->first();
        if($user){
            if($password==$user->password){
                return response()->json(['user'=>$user,'status'=>'success']);
            }else{
                return response()->json(['message'=>"False password",'status'=>'error']);
            }
        }else{
            return response()->json(['message'=>"Exitsn't User",'status'=>'error']);
        }
    }
    
    /**
     * sign
     */
    public function sign(){
        $input = request()->all();
        $email = $input['email'];
        $password = $input['password'];
        $name = $input['name'];

        $user = User::where('email',$email)->first();

        if($user){
            return response()->json(['message'=>"Exist account",'status'=>'error']);
        }else{
            $user = User::create([
                'name'=>$name,
                'password'=>$password,
                'email'=>$name,
            ]);
            if($user){
                return response()->json(['user'=>$user,'status'=>'success']);
            }else{
                return response()->json(['message'=>"Not create User",'status'=>'error']);
            }
        }
    }
}
