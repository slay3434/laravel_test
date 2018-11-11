<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    //
    
    public $timesstamps = false;
    
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
