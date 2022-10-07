<?php

namespace App\Observers;

use App\Models\Studentsdata;
use Illuminate\Support\Facades\Mail;
use App\Mail\deleteDataMail;
use Log;

class StudentsObserver
{
    /**
     * Handle the Studentsdata "created" event.
     *
     * @param  \App\Models\Studentsdata  $Studentsdata
     * @return void
     */

    public function creating(Studentsdata $Studentsdata)
    {
        
    }
    public function created(Studentsdata $Studentsdata)
    {
        Log::info("studentsObserver created");
    
    }
    
    /**
     * Handle the Studentsdata "updated" event.
     *
     * @param  \App\Models\Studentsdata  $Studentsdata
     * @return void
     */
    public function updated(Studentsdata $Studentsdata)
    {
        //
    }

    /**
     * Handle the Studentsdata "deleted" event.
     *
     * @param  \App\Models\Studentsdata  $Studentsdata
     * @return void
     */
    public function deleted(Studentsdata $Studentsdata)
    {
        //
        //     $deleteData=Studentsdata::where('id',$request->id)->first();
        Log::info("studentsObserver deleted");
     $Studentsdata->Mail::to('parth@123')->send(new deleteDataMail());
    // return $Studentsdata;
    dd($Studentsdata);
    }


    /**
     * Handle the Studentsdata "restored" event.
     *
     * @param  \App\Models\Studentsdata  $Studentsdata
     * @return void
     */
    public function restored(Studentsdata $Studentsdata)
    {
        //
    }

    /**
     * Handle the Studentsdata "force deleted" event.
     *
     * @param  \App\Models\Studentsdata  $Studentsdata
     * @return void
     */
    public function forceDeleted(Studentsdata $Studentsdata)
    {
        //
    }
}
