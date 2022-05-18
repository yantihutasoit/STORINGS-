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
                            <h2 class="text-light">Data Siswa</h2>
                        </div>
                        <div class="pull-right">
                            @can('Siswa-create')
                            <a class="btn btn-primary" href="{{ route('Siswa.create') }}"> Tambah Data Siswa</a>
                            <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-warning">Import Excel</a>
                            @endcan
                        </div>
                    </div>
                </div>


        @if ($message = Session::get('success'))
        <div class="alert alert-success mt-3">
            <p>{{ $message }}</p>
        </div>
        @endif
        @can('Siswa-create')
        <div class="container">
            <input type="text" name="cari" class="form-control mt-3 search-input" placeholder="Cari data disini..">
        </div class="mb-3">
        @endcan
        <div class="table-responsive mt-3">
            @can('role-list')
            <table class="table" style="color: white; font-size:18px;">
                <thead>
                    <tr class="text-center">
                        <th>Nis</th>
                        <th>Nama</th>
                        <th>Tempat lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas</th>
                        <th>Semester</th>
                        @can('role-list')
                        <th width="200px">Action</th>
                        @endcan
                    </tr>
                </thead>
                <tbody class="search-result">
                    @foreach ($Siswa as $siswa)
                    <tr>
                        <td>{{ $siswa->s_nis }}</td>
                        <td>{{ $siswa->s_nama }}</td>
                        <td>{{ $siswa->s_tempat_lahir }}</td>
                        <td>{{ $siswa->s_tgl_lahir }}</td>
                        <td>{{ $siswa->s_alamat }}</td>
                        <td>{{ $siswa->s_gender }}</td>
                        <td>{{ $siswa->s_kelas }}</td>
                        <td>{{ $siswa->s_semester }}</td>
                        @can('role-list')
                        <td width="200px">
                            <form action="{{ route('Siswa.destroy',$siswa->id) }}" method="POST">
                                @can('Siswa-edit')
                                <a class="btn btn-info" href="{{ route('Siswa.edit',$siswa->id) }}">Ubah</a>
                                @endcan
                                @csrf
                                @method("DELETE")
                                <button type="button" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger">Hapus</button>
                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        @endcan
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endcan

            @foreach ($Siswa as $siswa)
            @if(Auth::user()->name==$siswa->s_nama_ortu)
            <div class="text-center judul" style="text-transform: uppercase;color:#ffffff;font-size:20px">data sekolah dasar negeri 1 Ambarita</div>
            <div style="text-transform:uppercase;color:#ffffff;">
                <table class="row justify-content-center">
                    <tr>
                        <td>nama</td>
                        <td>:</td>
                        <td>{{ $siswa->s_nama }}</td>
                    </tr>
                    <tr>
                        <td>nomor induk siswa</td>
                        <td>:</td>
                        <td>{{ $siswa->s_nis }}</td>
                    </tr>
                    <tr>
                        <td>tempat/tanggal lahir</td>
                        <td>:</td>
                        <td>{{ $siswa->s_tempat_lahir }}, {{ $siswa->s_tgl_lahir }}</td>
                    </tr>
                    <tr>
                        <td>alamat</td>
                        <td>:</td>
                        <td>{{ $siswa->s_alamat }}</td>
                    </tr>
                    <tr>
                        <td>jenis kelamin</td>
                        <td>:</td>
                        <td>{{ $siswa->s_gender }}</td>
                    </tr>
                    <tr>
                        <td>kelas</td>
                        <td>:</td>
                        <td>{{ $siswa->s_kelas }}</td>
                    </tr>
                    <tr>
                        <td>semester</td>
                        <td>:</td>
                        <td>{{ $siswa->s_semester }}</td>
                    </tr>
                </table>
            @endif
            @endforeach
        </div><br>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('fileImport') }}" method="post" enctype="multipart/form-data">
                                <div class="modal-body">

                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <input type="file" name="file" required="required">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
    @can('role-list')
    <div class="container">
        {!! $Siswa->render() !!}
    </div>
    @endcan
</section>
<br>
@endsection
