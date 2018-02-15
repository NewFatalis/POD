<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offense extends Model
{

    protected $fillable = [
        'student_id', 'date_commit','violation_id','student_offense','sanction','description','schoolyear_id','semester_id','class_id'
    ];
    public $incrementing = true;
}
