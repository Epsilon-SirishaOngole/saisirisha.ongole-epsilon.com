<?php

namespace LearnApp\Http\Controllers;

use Illuminate\Http\Request;

class Login extends Controller
{
    public function login(){
        return view('login');
    }
    public function show(Request $request){
        print_r($request->input());
    }

}
