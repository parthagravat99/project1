<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ApiController extends Controller
{
    //
    public function showdata()
    {
        $data=User::all();
        return $data;
    }
}
