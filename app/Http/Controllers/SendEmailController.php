<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyMail;
use App\Mail\deleteDataMail;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class SendEmailController extends Controller
{
    //
    public function index()
    {
 
      Mail::to('hello123@example.com')->send(new NotifyMail());
 
     //  if (Mail::failures()) {
     //       return response()->Fail('Sorry! Please try again latter');
     //  }else{
          //  return response()->success('Great! Successfully send in your mail');
     //     }
     return response()->json([
          'message' => 'Email has been sent.'
      ], Response::HTTP_OK);
    } 

    public function deleteDataEmail(request $request)
    {
     $deleteData=User::where('id',$request->id)->first();
     Mail::to($deleteData->email)->send(new deleteDataMail());
  
    }
}
