<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    
    protected $table = 'transaksi';

    protected $fillable = [
        'bookId', 'memberId', 'isVerified', 'isReturned', 'tgl_kembali', 'denda'
    ];
}
