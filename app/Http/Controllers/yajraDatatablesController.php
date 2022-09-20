<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\studentsdata;
use Carbon\Carbon;


class yajraDatatablesController extends Controller
{
    public function index(){
        
        if(request()->ajax()) {
            $data=studentsdata::select('*');
            return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('created_at', function() {
                return Carbon::now();
            })
            ->addColumn('action', function($data){
       
                $btn = '<button type="button" id="edit_button" onclick="javascript:void(0)">edit</button>';
                $btn = $btn.'<button type="button" id="delete_button" onclick="javascript:void(0)">delete</button>';

                 return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('usingYajraDatatables');
    }
}
