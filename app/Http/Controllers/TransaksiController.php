<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaction::all();

    }

    public function create(Request $request)
    {
        dd($request->id);
        Transaction::create([
            'userId' => $request->id,
            'bookId' => $request->bookId,
            'tgl_kembali' => Carbon::today()->add(1, 'week')
        ]);

        return redirect(route('user.history', [
            'id' => $request->id
            ]));
    }

    public function showByUserId($id)
    {
        $history = Transaction::where('userId', $id)->get();

        return view('user.history', [
            'history' => $history
        ]);
    }
}
