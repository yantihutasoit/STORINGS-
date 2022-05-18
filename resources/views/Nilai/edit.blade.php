@extends('layouts.app')


@section('content')
<div class="container mt-5">

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Ubah Nilai</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('Nilai.index') }}"> Kembali</a>
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
    <form action="{{ route('Nilai.update',$Nilai->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-row">
            <div class="form-group col-md-6">
                <label for="n_nama" class="col-form-label"><strong>Nama :</strong></label>
                <input type="text" name="n_nama" class="form-control" placeholder="Masukkan Nama..." value="{{ $Nilai->n_nama }}" required>
            </div>
            <div class="form-group col-md-6">
                <label for="n_nis" class="col-form-label"><strong>NIS (Nomor Induk Siswa):</strong></label>
                <input type="text" name="n_nis" class="form-control" placeholder="Masukkan NIS..." value="{{ $Nilai->n_nis }}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="n_nama_ortu" class="col-form-label"><strong>Nama Orang Tua:</strong></label>
                <input type="text" name="n_nama_ortu" class="form-control" placeholder="Masukkan Nama Orang Tua..." value="{{ $Nilai->n_nama_ortu }}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="n_agama" class="col-form-label"><strong>Nilai Agama:</strong></label>
                <input type="number" name="n_agama" class="form-control" placeholder="Masukkan Nilai Agama ..." value="{{ $Nilai->n_agama }}" required>
            </div>
            <div class="form-group col-md-4">
                <label for="n_pkn" class="col-form-label"><strong>Nilai PKN :</strong></label>
                <input type="number" name="n_pkn" class="form-control" placeholder="Masukkan Nilai PKN ..." value="{{ $Nilai->n_pkn }}" required>
            </div>
            <div class="form-group col-md-4">
                <label for="n_bindo" class="col-form-label"><strong>Nilai Bahasa Indonesia :</strong></label>
                <input type="number" name="n_bindo" class="form-control" placeholder="Masukkan Nilai Bahasa Indonesia ..." value="{{ $Nilai->n_bindo }}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="n_bing" class="col-form-label"><strong>Nilai English:</strong></label>
                <input type="number" name="n_bing" class="form-control" placeholder="Masukkan Nilai English ..." value="{{ $Nilai->n_bing }}" required>
            </div>
            <div class="form-group col-md-4">
                <label for="n_ipa" class="col-form-label"><strong>Nilai IPA :</strong></label>
                <input type="number" name="n_ipa" class="form-control" placeholder="Masukkan Nilai IPA ..."  value="{{ $Nilai->n_ipa }}" required>
            </div>
            <div class="form-group col-md-4">
                <label for="n_ips" class="col-form-label"><strong>Nilai IPS :</strong></label>
                <input type="number" name="n_ips" class="form-control" placeholder="Masukkan Nilai IPS ..." value="{{ $Nilai->n_ips }}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="n_mtk" class="col-form-label"><strong>Nilai Matematika:</strong></label>
                <input type="number" name="n_mtk" class="form-control" placeholder="Masukkan Nilai Matematika ..." value="{{ $Nilai->n_mtk }}" required>
            </div>
            <div class="form-group col-md-4">
                <label for="n_sbk" class="col-form-label"><strong>Nilai Seni Budaya :</strong></label>
                <input type="number" name="n_sbk" class="form-control" placeholder="Masukkan Nilai Seni Budaya ..." value="{{ $Nilai->n_sbk }}" required>
            </div>
            <div class="form-group col-md-4">
                <label for="n_penjas" class="col-form-label"><strong>Nilai Penjas :</strong></label>
                <input type="number" name="n_penjas" class="form-control" placeholder="Masukkan Nilai Penjas ..." value="{{ $Nilai->n_penjas }}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="kkm" class="col-form-label"><strong>Nilai KKM :</strong></label>
                <input type="number" name="kkm" class="form-control" placeholder="Masukkan Nilai KKM ..." value="{{ $Nilai->kkm }}" required>
            </div>

        </div>
        <button type="submit" class="button button-border button-rounded button-green"><i class="fa fa-check-circle"></i> Simpan</button>
    </form>
</div>

</div>
@endsection
