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
        return $this->belongsToMany('App\Books', 'after_book', 'after_id', 'book_id');
    }
}
