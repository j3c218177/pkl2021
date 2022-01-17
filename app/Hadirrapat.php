<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hadirrapat extends Model
{
    protected $guarded = [];

    protected $table = "hadirrapats";
    public function peserta()
    {
        return $this->belongsTo('App\profil');
    }
}
