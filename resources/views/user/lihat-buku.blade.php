@extends('user.sidebar')

@section('sidebar-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Lihat Buku</div>
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
                                            @php
                                            $id = Auth::user()->id;
                                            @endphp
                                            <input type="hidden" name="id" value="{{ $id }}">
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
                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection