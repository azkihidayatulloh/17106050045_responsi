<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Book;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    public function indexByAdmin()
    {
        $history = Transaction::with('user', 'buku')->get();

        return view('admin.laporan-peminjaman', [
            'history' => $history
        ]);
    }

    public function indexRequest()
    {
        $request = Transaction::with('user', 'buku')->where('isVerified', false)->get();

        return view('admin.request-peminjaman', [
            'request' => $request
        ]);
    }

    public function create(Request $request)
    {
        Transaction::create([
            'userId' => $request->id,
            'bookId' => $request->bookId,
            'tgl_kembali' => Carbon::today()->add(1, 'week')
        ]);

        $book = Book::where('bookId' , $request->bookId)->first();

        Book::where('bookId', $request->bookId)->update([
            'quantity' => $book->quantity - 1
        ]);

        return redirect(route('user.history', [
            'id' => $request->id
            ]));
    }

    public function showByUserId($id)
    {
        $history = Transaction::with('buku')->where('userId', $id)->get();

        return view('user.history', [
            'history' => $history
        ]);
    }

    public function verifTransaction($id)
    {
        Transaction::where('transactionId', $id)->update([
            'isVerified' => true
        ]);

        return redirect(route('admin.request'));
    }

    public function kembalikanPinjaman(Request $request, $id)
    {
        Transaction::where('transactionId', $id)->update([
            'isReturned' => true
        ]);

        return redirect(route('user.history', [
            'id' => $request->id
        ]));
    }
}
