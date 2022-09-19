<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\studentsdata;


class yajraDatatablesController extends Controller
{
    public function index(){
        
        if(request()->ajax()) {
            return datatables()->of(studentsdata::select('*'))
            ->addIndexColumn()
            ->make(true);
        }
        return view('usingYajraDatatables');
    }
}
