@extends('admin.sidebar') 

@section('sidebar-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    Tambah Penulis
                    <a
                        class="btn btn-primary float-right" href="{{ route('admin.kelola_penulis') }}">
                        <span class="glyphicon glyphicon-plus"></span>
                        Kembali
                    </a>
                </div>
                
                <div class="card-body">
                <form method="POST" action="{{ route('admin.tambah_penulis.submit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="penulisName" class="col-md-4 col-form-label text-md-right">{{ __('Nama Penulis') }}</label>

                            <div class="col-md-6">
                                <input id="penulisName" type="text" class="form-control" name="penulisName" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tambah') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
