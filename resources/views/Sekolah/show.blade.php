@extends('layouts.app')


@section('content')
<div class="container mt-5">

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Data Sekolah</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('Sekolah.index') }}"> Kembali</a>
        </div>
    </div>
</div>


<div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>No Telepon</th>
                    <th>Gambar</th>
                </tr>
                <tr>
                    <td>{{ $Sekolah->i_nama }}</td>
                    <td>{{ $Sekolah->i_alamat }}</td>
                    <td>{{ $Sekolah->i_email }}</td>
                    <td>{{ $Sekolah->i_notelp }}</td>
                    <td><img src="{{asset('images/sekolah/'.$Sekolah->i_foto)}}" alt=""></td>
                </tr>
            </table>

        </div>
</div>
</div>

@endsection
