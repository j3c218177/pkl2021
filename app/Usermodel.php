<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usermodel extends Model
{
    protected $table = 'users';
    public function seminar()
    {
        return $this->hasMany('App\Seminar','id_pengedit','id');
    }
}
