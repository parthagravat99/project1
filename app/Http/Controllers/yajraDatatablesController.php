<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Studentsdata;
use Carbon\Carbon;
use App\Observers\studentsObserver;


class yajraDatatablesController extends Controller
{
    public function index(){
        
        if(request()->ajax()) {
            $data=Studentsdata::select('*');
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
        $com = Studentsdata::where('id',$request->id)->delete();
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
  
        $student = new Studentsdata();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();

        // 
        return view('usingYajraDatatables');
    }

    public function update($id)
    {
        $updateData=Studentsdata::where('id',$id)->first();
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

        Studentsdata::where('id',$id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
        ]);
        return view('usingYajraDatatables');
        
    }
}
