<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    //
   
       
        public function user()
        {
            return $this->belongsTo('App\User');
        }

        // public function jobpost(){
        //     return $this->belongsTo('App\Jobpost');
        // }
        
    
}
