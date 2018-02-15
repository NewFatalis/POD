<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sanction extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    protected $fillable = [
        'sanction', 
        'group_id'
    ];

    public $timestamps = true;
}
