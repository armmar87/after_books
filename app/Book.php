<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps = false;
    public $table = "books";

    protected $fillable = [
        'name'
    ];

    public function afters()
    {
        return $this->belongsToMany(After::class);
    }
}
