@extends('layouts.app')
@section('content')
<style>
    td{
       padding: 10px;
       font-size: 16px;
       letter-spacing: 1px;
       font-weight: bold;
       line-height: 1.5;
    }
    .judul{
        letter-spacing: 3px;
        font-weight: bold;
    }
</style>
<section>
    <div class="container mt-5" style="background-image: url('images/landing/green.jpg');background-size:cover;">
        <div class="border-success">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pull-left">
                            <h2 class="text-light">Data Nilai</h2>
                        </div>
                        @can('Nilai-create')
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('Nilai.create') }}">Tambah Nilai</a>
                            <a class="btn btn-warning" href="{{ route('email.broadcast') }}">Broadcast Nilai</a>
                        </div>
                        @endcan
                    </div>
                </div>

                @if ($message = Session::get('success'))
                <div class="alert alert-success mt-3">
                    <p>{{ $message }}</p>
                </div>
                @endif
                @if(session()->has('message'))
                    <div class="alert alert-success mt-3">
                        {{ session()->get('message') }}
                    </div>
                @endif
                @can('Nilai-create')
                <div class="container">
                    <input type="text" name="search" class="form-control my-3 cari-input" placeholder="Cari disini..">
                </div class="mb-3">
                @endcan
                <div class="table-responsive">
                    @can('role-list')
                    <table class="table" style="color: white; font-size:18px;">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NIS</th>
                        <th>Rata-Rata</th>
                        @can('role-list')
                        <th style="width: 370px;" class="text-center">Action</th>
                        @endcan
                    </tr>
                </thead>
                <tbody class="search-result ">
                    @foreach ($Nilai as $nilai)
                    <tr>
                        <td>{{ $nilai->n_nama }}</td>
                        <td>{{ $nilai->n_nis }}</td>
                        <td>{{ number_format(($nilai->n_agama+$nilai->n_pkn+$nilai->n_bindo+$nilai->n_bing+$nilai->n_ipa+$nilai->n_ips+$nilai->n_mtk+$nilai->n_sbk+$nilai->n_penjas)/9 ,2) }}</td>
                        @can('role-list')
                        <td>
                            <form action="{{ route('Nilai.destroy',$nilai->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('Nilai.show',$nilai->id) }}">Lihat</a>
                                @can('Siswa-edit')
                                <a class="btn btn-info" href="{{ route('Nilai.edit',$nilai->id) }}">Ubah</a>
                                <a class="btn btn-warning" href="{{ route('Nilai.email_nilai',$nilai->id) }}">Kirim Email</a>
                                @endcan
                                @csrf
                                @method("DELETE")
                                <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger">Hapus</button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="exampleModalLabel">Peringatan</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-dark">
                                                <p>Apakah Anda Yakin untuk menghapus data ini?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                <button type="submit" class="btn btn-primary">Yakin</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </td>
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>
            @endcan

            @foreach ($Nilai as $nilai)
            @if(Auth::user()->name==$nilai->n_nama_ortu)
            <div class="text-center judul" style="text-transform: uppercase;color:#ffffff;font-size:20px">nilai rapor sekolah dasar negeri 1 Ambarita</div>
            <div style="text-transform:uppercase;color:#ffffff;">
                <table class="row justify-content-center">
                    <tr>
                        <td>nama</td>
                        <td>:</td>
                        <td>{{ $nilai->n_nama }}</td>
                    </tr>
                    <tr>
                        <td>nomor induk siswa</td>
                        <td>:</td>
                        <td>{{ $nilai->n_nis }}</td>
                    </tr>
                    <tr>
                        <td>nilai agama</td>
                        <td>:</td>
                        <td>{{ $nilai->n_agama }}</td>
                    </tr>
                    <tr>
                        <td>nilai pendidikan kewarganegaraan</td>
                        <td>:</td>
                        <td>{{ $nilai->n_pkn }}</td>
                    </tr>
                    <tr>
                        <td>nilai bahasa indonesia</td>
                        <td>:</td>
                        <td>{{ $nilai->n_bindo }}</td>
                    </tr>
                    <tr>
                        <td>nilai bahasa inggris</td>
                        <td>:</td>
                        <td>{{ $nilai->n_bing }}</td>
                    </tr>
                    <tr>
                        <td>nilai ilmu pengetahuan alam</td>
                        <td>:</td>
                        <td>{{ $nilai->n_ipa }}</td>
                    </tr>
                    <tr>
                        <td>nilai ilmu pengetahuan sosial</td>
                        <td>:</td>
                        <td>{{ $nilai->n_ips }}</td>
                    </tr>
                    <tr>
                        <td>Nilai Matematika</td>
                        <td>:</td>
                        <td>{{ $nilai->n_mtk }}</td>
                    </tr>
                    <tr>
                        <td>nilai seni budaya</td>
                        <td>:</td>
                        <td>{{ $nilai->n_sbk }}</td>
                    </tr>
                    <tr>
                        <td>nilai pendidikan jasmani</td>
                        <td>:</td>
                        <td>{{ $nilai->n_penjas }}</td>
                    </tr>
                    <!-- <tr>
                        <td>nilai kriteria ketuntasan minimal (KKM)</td>
                        <td>:</td>
                        <td>{{ $nilai->kkm }}</td>
                    </tr> -->
                    <tr>
                        <td>nilai rata-rata</td>
                        <td>:</td>
                        <td>{{ number_format(($nilai->n_agama+$nilai->n_pkn+$nilai->n_bindo+$nilai->n_bing+$nilai->n_ipa+$nilai->n_ips+$nilai->n_mtk+$nilai->n_sbk+$nilai->n_penjas)/9 ,2) }}</td>
                    </tr>
                </table>
            </div>
            @endif
            @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div><br>
    @can('role-list')
    <div class="container">
        {!! $Nilai->render() !!}
    </div>
    @endcan
</section>
<br>


@endsection
