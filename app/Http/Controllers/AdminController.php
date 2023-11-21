<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public  function loginAdmin(){
        /*if(auth()->check())
        {
            return redirect()->to('home');
        }*/
        return view('login');
    }
    public  function  postLoginAdmin(Request $request){
        if(auth()->attempt([
            'email'=>$request['email'],
            'password'=>$request['password']
        ])){
            return redirect()->to('home');
        }
        return view('login');

    }

}
