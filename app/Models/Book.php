<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';

    protected $fillable = [
        'bookTitle', 'penulisId', 'quantity'
    ];

    public function penulis()
    {
        return $this->belongsTo('App\Models\Penulis', 'penulisId', 'penulisId');
    }
}
