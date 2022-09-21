<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class myFirstController extends Controller
{
    //
    public function helloUser($name=null)
    {
        return view('hello',['name123'=>$name]);
    }

    
}
