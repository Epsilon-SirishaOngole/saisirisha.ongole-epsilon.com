<?php

namespace LearnApp\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        return view('home');
    }

}
