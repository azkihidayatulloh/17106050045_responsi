@extends('admin.sidebar')

@section('sidebar-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Request Peminjaman</div>
                <table class="table" id="table">
                        <thead>
                            <tr>
                                <th class="text-center">Id Pinjam</th>
                                <th class="text-center">Judul Buku</th>
                                <th class="text-center">Nama Peminjam</th>
                                <th class="text-center">Tanggal Pinjam</th>
                                <th class="text-center">Tanggal Kembali</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($request as $item)
                            <tr>
                                <td>{{ $item->transactionId }}</td>
                                <td>{{ $item->buku->bookTitle }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->tgl_kembali }}</td>
                                <td>
                                    <form action="{{ route('admin.request.verif', ['id' => $item->transactionId]) }}" method="post">
                                        <input type="submit" class="btn btn-primary" value="Verifikasi">
                                        @csrf
                                    </form>
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
