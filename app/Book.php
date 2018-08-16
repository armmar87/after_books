<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public function afters()
    {
        return $this->belongsToMany('App\After');
    }
}
