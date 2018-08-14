<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Afters extends Model
{
    protected $fillable = [
        'name'
    ];

    public function books()
    {
        return $this->belongsToMany('App\Books', 'after_book', 'after_id', 'book_id');
    }
}
