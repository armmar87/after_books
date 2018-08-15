<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public function afters()
    {
        return $this->belongsToMany('App\Afters');
    }
}
