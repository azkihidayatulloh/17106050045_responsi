<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    protected $table = 'penulis';

    protected $fillable = [
        'penulisName'
    ];

    public function buku()
    {
        return $this->hasMany('App\Models\Book', 'penulisId', 'penulisId');
    }
}
