<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Penulis;

class BukuController extends Controller
{
    public function indexByGuest()
    {
        $buku = Book::with('penulis')->get();

        return view('lihat-buku', [
            'buku' => $buku
        ]);
    }

    public function indexByUser()
    {
        $buku = Book::with('penulis')->get();

        return view('user.lihat-buku', [
            'buku' => $buku
        ]);
    }

    public function index()
    {
        $buku = Book::with('penulis')->get();

        return view('admin.kelola-buku', [
            'buku' => $buku
        ]);
    }

    public function store(Request $request)
    {
        Book::create([
            'bookTitle' => $request->bookTitle,
            'penulisId' => $request->penulisId,
            'quantity' => $request->quantity,
            'image_url' => $request->image_url
        ]);

        return redirect(route('admin.kelola_buku'));
    }

    public function showTambahBukuForm()
    {
        $penulis = Penulis::all();
        return view('admin.tambah-buku',[
            'penulis' => $penulis
        ]);
    }
}
