@extends('admin.sidebar') 

@section('sidebar-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    Tambah Penulis
                    <a
                        class="btn btn-primary float-right" href="{{ route('admin.kelola_buku') }}">
                        <span class="glyphicon glyphicon-plus"></span>
                        Kembali
                    </a>
                </div>
                
                <div class="card-body">
                <form method="POST" action="{{ route('admin.tambah_buku.submit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="bookTitle" class="col-md-4 col-form-label text-md-right">{{ __('Judul Buku') }}</label>

                            <div class="col-md-6">
                                <input id="bookTitle" type="text" class="form-control" name="bookTitle" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="penulis"
                                class="col-md-4 col-form-label text-md-right">{{ __('Penulis') }}</label>

                            <div class="col-md-6">
                                <select id="penulis" class="form-control" name="penulisId" required>
                                    <option></Option>
                                    @foreach($penulis as $item)
                                    <option value="{{$item->penulisId}}">{{$item->penulisName}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>

                            <div class="col-md-6">
                                <input id="quantity" type="text" class="form-control" name="quantity" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image_url" class="col-md-4 col-form-label text-md-right">{{ __('Image Url') }}</label>

                            <div class="col-md-6">
                                <input id="image_url" type="text" class="form-control" name="image_url" autofocus>
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
