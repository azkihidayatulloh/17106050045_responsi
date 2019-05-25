@extends('admin.sidebar') 

@section('sidebar-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    Kelola Buku
                    <a
                        class="btn btn-primary float-right" href="{{ route('admin.tambah_buku') }}">
                        <span class="glyphicon glyphicon-plus"></span>
                        Tambah Buku
                    </a>
                </div>

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
                                    <button
                                        class="edit-modal btn btn-info"
                                        data-info="{{$item->penulisId}}">
                                        <span
                                            class="glyphicon glyphicon-edit"></span>
                                        Edit
                                    </button>
                                    <button
                                        class="delete-modal btn btn-danger"
                                        data-info="{{$item->penulisId}}">
                                        <span
                                            class="glyphicon glyphicon-trash"></span>
                                        Delete
                                    </button>
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
    $(document).ready(function() {
        $("#table").DataTable();
    });
</script>
@endsection
