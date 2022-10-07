<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studentsdata;


class datatablesController extends Controller
{
    //
    public function showDatatables()
    {
        $data = Studentsdata::all ();
        return view ( 'usingdatatables' )->withData ( $data ); 
    }
}
