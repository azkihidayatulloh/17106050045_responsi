@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar Buku</div>

                <div class="card-body">
                <table class="table" id="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Judul Buku</th>
                                <th class="text-center">Penulis</th>
                                <th class="text-center">Jumlah Buku</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($buku as $item)
                            <tr>
                                <td>{{ $item->bookId }}</td>
                                <td>{{ $item->bookTitle }}</td>
                                <td>{{ $item->penulis->penulisName }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>
                                    @auth
                                        <form action="{{ route('pinjam_buku') }}" method="post">
                                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="bookId" value="{{ $item->bookId }}">
                                            <input type="submit" class="btn btn-primary" value="Pinjam">
                                            @csrf
                                        </form>
                                    @else
                                        <button onclick="showAlertPinjam()" class="btn btn-primary">
                                            Pinjam
                                        </button>
                                    @endauth
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function showAlertPinjam() {
    alert("Kamu harus login untuk melakukan peminjaman!");
}
</script>
@endsection