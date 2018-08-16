<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class After extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public function books()
    {
        return $this->belongsToMany('App\Book');
    }
}
