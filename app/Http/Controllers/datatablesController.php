<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\studentsdata;


class datatablesController extends Controller
{
    //
    public function showDatatables()
    {
        $data = studentsdata::all ();
        return view ( 'usingdatatables' )->withData ( $data ); 
    }
}
