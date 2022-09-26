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
       
                $btn = '<button type="button" class="edit_button" value='.$data->id.'>edit</button>';
                $btn = $btn.'&nbsp&nbsp<button type="button" class="delete_button" value='.$data->id.'>delete</button>';

                 return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('usingYajraDatatables');
    }

    public function destroy(Request $request)
    {
        $com = studentsdata::where('id',$request->id)->delete();
        return Response()->json($com);
    }

    public function input(Request $request)
    {   
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
          ]);
        //   if($validatedData->fails()){
        //     return back()->withErrors($validatedData->errors())->withInput();
        //   }
  

        studentsdata::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
        ]);
        // return view('usingYajraDatatables');
    }

    public function update($id)
    {
        $updateData=studentsdata::where('id',$id)->first();
        return view('form',['updateData'=>$updateData]);
    
    }

    public function updateData(Request $request,$id)
    {   
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
          ]);
        //   if($validatedData->fails()){
        //     return back()->withErrors($validatedData->errors())->withInput();
        //   }

        studentsdata::where('id',$id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
        ]);
        // return view('usingYajraDatatables');
        
    }
}
