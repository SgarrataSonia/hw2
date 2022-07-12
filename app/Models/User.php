<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function prefer() 
    {
        return $this->hasMany('App\Models\Prefer');
    }
    public $timestamps = false;

    protected $fillable = ['nome', 'cognome', 'username', 'email', 'password'];
}

?>