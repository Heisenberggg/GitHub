<?php

namespace App\Http\Controllers\User;

use Request;
use App\Http\Controllers\Controller;
use App\Model\User;

class UserController extends Controller
{


    public function check_login(){
        $user = new User;


    }

    public function login(){

        return view('login')->with('name', 'Victoria');
    }
}
