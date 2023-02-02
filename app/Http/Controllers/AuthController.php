<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        if(Auth::check()){
            return redirect()->route('dashboard.index');
        }
        return view('login'); 
    }

    public function PostLogin(Request $request)
    {
        $data=$request->only('email','password');
        if(Auth::attempt($data)){
           return response()->json(['status'=>'success']);
        }else{
            return response()->json(['status'=>'error']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return  redirect()->route('login');
    }
}
