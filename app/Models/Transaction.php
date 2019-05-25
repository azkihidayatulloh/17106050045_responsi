<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    
    protected $table = 'transaksi';

    protected $fillable = [
        'bookId', 'userId', 'isVerified', 'isReturned', 'tgl_kembali', 'denda'
    ];

    public function buku()
    {
        return $this->belongsTo('App\Models\Book', 'bookId', 'bookId');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'userId');
    }
}
