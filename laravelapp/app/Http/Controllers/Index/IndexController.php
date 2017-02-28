<?php

namespace App\Http\Controllers\Index;

use Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function index(){
        return "这里是主页";
        //return view('login')->with('name', 'Victoria');
    }
}

