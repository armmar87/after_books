<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class After extends Model
{
    public $timestamps = false;
    public $table = "afters";

    protected $fillable = [
        'name'
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
