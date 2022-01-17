<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    protected $guarded = [];

    public function editor()
    {
        return $this->belongsTo('App\Profil');
    }
}
