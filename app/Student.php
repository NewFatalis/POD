<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
//    public function user(){
//        return $this->belongsTo('App\User');
//    }
    protected $fillable = [
        'student_id', 'sy_id','first_name','middle_name','last_name','adviser_id','section_id','semester','class'
    ];
}
