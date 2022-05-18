@extends('layouts.app')


@section('content')

<div class="container mt-5">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="text-dark">Tambah Siswa</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('Siswa.index')}}">Kembali</a>
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

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="card-body">
        <form action="{{ route('Siswa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="s_nis" class="col-form-label"><strong>NIS :</strong></label>
                    <input type="text" name="s_nis" class="form-control" placeholder="Masukkan NIS ..." required>
                </div>
                <div class="form-group col-md-6">
                    <label for="s_nama">Nama Siswa:</label>
                    <select name="s_nama" class="form-control nameortu">
                        <option value="">--- Pilih Nama ---</option>
                        @foreach ($Siswa as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="s_nama_ortu" class="col-form-label"><strong>Nama Orang Tua :</strong></label>
                    <input type="text" name="s_nama_ortu" class="form-control hasil" placeholder="Masukkan Nama Orang Tua ..." required>
                </div>
            </div>
            <div class="form-row travel-date-group">
                <div class="form-group col-md-4">
                    <label for="s_tgl_lahir" class="col-form-label"><strong>Tanggal Lahir:</strong></label>
                    <input type="text" name="s_tgl_lahir" class="form-control tleft format" placeholder="YYYY-MM-DD">
                </div>
                <div class="form-group col-md-4">
                    <label for="s_tempat_lahir" class="col-form-label"><strong>Tempat Lahir:</strong></label>
                    <input type="text" class="form-control" name="s_tempat_lahir" id="s_tempat_lahir" placeholder="Tempat Lahir.." required>
                </div>
                <div class="form-group col-md-4">
                    <label for="s_gender" class="col-form-label"><strong>Jenis Kelamin:</strong></label>
                    <select name="s_gender" class="form-control">
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="s_alamat" class="col-form-label"><strong>Alamat :</strong></label>
                    <input type="text" name="s_alamat" class="form-control" placeholder="Masukkan Alamat ..." required>
                </div>
                <div class="form-group col-md-6">
                    <label for="s_semester" class="col-form-label"><strong>Semester :</strong></label>
                    <select name="s_semester" class="form-control">
                        <option value="satu">1</option>
                        <option value="dua">2</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="s_kelas" class="col-form-label"><strong>Kelas :</strong></label>
                <select name="s_kelas" class="form-control">
                    <option value="satu">1</option>
                    <option value="dua">2</option>
                    <option value="tiga">3</option>
                    <option value="empat">4</option>
                    <option value="lima">5</option>
                    <option value="enam">6</option>
                </select>
            </div>
            <button type="submit" class="button button-border button-rounded button-green"><i class="fa fa-check-circle"></i> Simpan</button>
        </form>
    </div>
</div>


@endsection
