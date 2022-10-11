<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class ApiController extends Controller
{
    //
    public function showdata()
    {
        $data=User::select('name','email')->get();
        return $data;
    }
}
