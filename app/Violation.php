<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    protected $fillable = [
        'violation', 
        'category',
        'group_id'
    ];

    public $timestamps = true;
}
