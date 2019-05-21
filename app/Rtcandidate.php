<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rtcandidate extends Model
{
    use SoftDeletes;
    public function users(){
        return $this->belongsToMany('App\User');
    }
}
