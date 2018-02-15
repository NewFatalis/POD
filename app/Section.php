<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
//    public function user(){
//        return $this->belongsTo('App\User');
//    }
    protected $fillable = [
        'grade', 'section','group_id'
    ];

}
