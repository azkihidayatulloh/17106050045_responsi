@extends('admin.sidebar') @section('sidebar-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <span class="align-middle">Kelola Penulis</span>
                    <a
                        class="btn btn-primary float-right" href="{{ route('admin.tambah_penulis') }}">
                        <span class="glyphicon glyphicon-plus"></span>
                        Tambah Penulis
                    </a>
                </div>
                
                <div class="card-body">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nama Penulis</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($penulis as $item)
                            <tr>
                                <td>{{ $item->penulisId }}</td>
                                <td>{{ $item->penulisName }}</td>
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
