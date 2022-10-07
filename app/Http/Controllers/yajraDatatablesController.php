<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Observers\studentsObserver;


class yajraDatatablesController extends Controller
{
    public function index(){
        
        if(request()->ajax()) {
            $data=User::select('*');
            return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('created_at', function($data) {
                return $data->created_at;
            })
            ->addColumn('subscrioption',function($data){
                $subscribe= new User;
                return $subscribe->subscriptiondays($data->created_at);
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
        $com = User::where('id',$request->id);
        $com->delete();
        return Response()->json($com);
    }

    public function input(Request $request)
    {   
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|max:255',
            'password' => 'required|max:255'
          ]);
        //   if($validatedData->fails()){
        //     return back()->withErrors($validatedData->errors())->withInput();
        //   }
  
        $student = new User();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = $request->password;

        $student->save();

        // 
        return redirect(url('usingyajradatatables'));
        // return subscriptiondays(Carbon::now());
    }

    public function update($id)
    {
        $updateData=User::where('id',$id)->first();
        return view('form',['updateData'=>$updateData]);
    
    }

    public function updateData(Request $request,$id)
    {   
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|max:255',
            // 'password' => 'required|max:255'

        ]);
        //   if($validatedData->fails()){
        //     return back()->withErrors($validatedData->errors())->withInput();
        //   }

        // User::where('id',$id)->update([
        //     'name'=>$request->name,
        //     'email'=>$request->email,
        //     'phone'=>$request->phone,
        // ]);
        $student=User::find($id);
        $student->name = $request->name;
        $student->email = $request->email;
        // $student->password = $request->password;

        $student->save();
        return redirect(url('usingyajradatatables'));
        
    }
}
