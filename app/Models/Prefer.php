<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prefer extends Model
{
    public function user() 
    {
        return $this->belongsTo('App\Models\User'); 
    }
    public $timestamps = false;
}

?>