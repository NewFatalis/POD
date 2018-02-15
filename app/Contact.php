<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
//    public function user(){
//        return $this->belongsTo('App\User');
//    }
    protected $fillable = [
        'name', 'contact_no','group_id'
    ];

}
