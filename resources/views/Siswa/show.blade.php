@extends('layouts.app')


@section('content')
<div class="container mt-5">

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Data Siswa</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('Siswa.index') }}"> Kembali</a>
        </div>
    </div>
</div>


<div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Nis</th>
                    <th>Nama</th>
                    <th>Tempat lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas</th>
                    <th>Semester</th>
                </tr>
                <tr>
                    <td>{{ $Siswa->s_nis }}</td>
                    <td>{{ $Siswa->s_nama }}</td>
                    <td>{{ $Siswa->s_tempat_lahir }}</td>
                    <td>{{ $Siswa->s_tgl_lahir }}</td>
                    <td>{{ $Siswa->s_alamat }}</td>
                    <td>{{ $Siswa->s_gender }}</td>
                    <td>{{ $Siswa->s_kelas }}</td>
                    <td>{{ $Siswa->s_semester }}</td>
                </tr>
            </table>

        </div>
</div>

@endsection
