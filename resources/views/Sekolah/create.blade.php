@extends('layouts.app')


@section('content')

    <div class="container mt-5">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="text-dark">Tambah Data Sekolah</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('Sekolah.index')}}">Kembali</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
    <div class="alert alert-success">
    <p>{{ $message }}</p>
    </div>
    @endif

    <div class="card-body">
                <form action="{{ route('Sekolah.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="i_nama" class="col-form-label"><strong>Nama Sekolah :</strong></label>
                            <input type="text" name="i_nama" class="form-control" placeholder="Masukkan Nama Sekolah..." required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="i_alamat" class="col-form-label"><strong>Alamat :</strong></label>
                            <input type="text" name="i_alamat" class="form-control" placeholder="Masukkan Alamat Sekolah ..." required>
                        </div>
                    </div>
                    <div class="form-row travel-date-group">
                        <div class="form-group col-md-6">
                            <label for="i_email" class="col-form-label"><strong>Email :</strong></label>
                            <input type="email" name="i_email" class="form-control" placeholder="nama@gmail.com....">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="i_notelp" class="col-form-label"><strong>No Telepon:</strong></label>
                            <input type="text" class="form-control" name="i_notelp" id="i_notelp" placeholder="Nomor Telepon Sekolah.." required>
                        </div>
                    </div>
                    <div class="form-row travel-date-group">
                        <div class="form-group col-md-12">
                            <label for="i_foto" class="col-form-label"><strong>Gambar :</strong></label>
                            <input type="file" class="form-control" name="i_foto" id="i_foto" placeholder="Image URL">
                        </div>
                    </div>
                    <button type="submit" class="button button-border button-rounded button-green"><i class="fa fa-check-circle"></i> Simpan</button>
                </form>
            </div>
    </div>


@endsection
