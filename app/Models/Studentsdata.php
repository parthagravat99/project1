<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Observers\StudentsObserver;
use Illuminate\Database\Eloquent\Concerns\HasEvents;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Studentsdata extends Model
{
    use HasFactory;
    use HasEvents;

    protected $table="students";

    public static function boot()
    {
        parent::boot();

        // Studentsdata::observe(new StudentsObserver);
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name']=strtolower($value);
    }
    
    public function setEmailAttribute($value)
    {
        $this->attributes['email']=strtolower($value);
    }
}
