<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penulis;

class PenulisController extends Controller
{
    public function index()
    {
        $penulis = Penulis::all();

        return view('admin.kelola-penulis', [
            'penulis' => $penulis
        ]);
    }

    public function store(Request $request)
    {
        Penulis::create([
            'penulisName' => $request->penulisName
        ]);

        return redirect(route('admin.kelola_penulis'));
    }

    public function showTambahPenulisForm()
    {
        return view('admin.tambah-penulis');
    }
}
