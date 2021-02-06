<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobpost extends Model
{
   
    public function user()
    {
        return $this->belongsTo('App\User');
    }

  
}
