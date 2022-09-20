<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    //
    public function show()
    {   $user = Auth::user();
        $name=$user->name;
        $email=$user->email;
        return view('profile',['name123'=>$name,'email123'=>$email]);
    }
}
