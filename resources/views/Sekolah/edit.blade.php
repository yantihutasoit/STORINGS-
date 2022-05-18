@extends('layouts.app')


@section('content')
<div class="container mt-5">

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Ubah Data Sekolah</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('Sekolah.index') }}"> Kembali</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif


<div class="card-body">
                <form action="{{ route('Sekolah.update',$Sekolah->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="i_nama" class="col-form-label"><strong>Nama Sekolah :</strong></label>
                            <input type="text" name="i_nama" class="form-control" placeholder="Masukkan Nama Sekolah..." value="{{$Sekolah->i_nama}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="i_alamat" class="col-form-label"><strong>Alamat :</strong></label>
                            <input type="text" name="i_alamat" class="form-control" placeholder="Masukkan Alamat Sekolah ..." value="{{$Sekolah->i_alamat}}" required>
                        </div>
                    </div>
                    <div class="form-row travel-date-group">
                        <div class="form-group col-md-6">
                            <label for="i_email" class="col-form-label"><strong>Email :</strong></label>
                            <input type="email" name="i_email" class="form-control" placeholder="nama@gmail.com...." value="{{$Sekolah->i_email}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="i_notelp" class="col-form-label"><strong>No Telepon:</strong></label>
                            <input type="text" class="form-control" name="i_notelp" id="i_notelp" placeholder="Nomor Telepon Sekolah.." value="{{$Sekolah->i_notelp}}" required>
                        </div>
                    </div>
                    <div class="form-row travel-date-group">
                        <div class="form-group col-md-12">
                            <label for="i_foto" class="col-form-label"><strong>Gambar :</strong></label>
                            <input type="file" class="form-control" name="i_foto" id="i_foto" placeholder="Image URL">
                            <img src="{{asset('images/sekolah/'.$Sekolah->i_foto)}}" alt="{{$Sekolah->i_foto}}" class="img-fluid"  style="width: 50%;">
                        </div>
                    </div>
                    <button type="submit" class="button button-border button-rounded button-green"><i class="fa fa-check-circle"></i> Simpan</button>
                </form>
            </div>
{!! Form::close() !!}
</div>



@endsection
