<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    protected $guarded = [];
    
    protected $table = "seminars";
    
    public function user()
    {
        return $this->belongsTo('App\Usermodel','id_pengedit','id');
    }
}
