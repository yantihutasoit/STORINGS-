@extends('layouts.app')


@section('content')

<div class="container mt-5" style="background-image: url('images/landing/green.jpg');background-size:cover;">
        <div class="border-success">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2 class="text-light">Info Sekolah</h2>
                        </div>
                        <div class="pull-right mb-3">
                            @can('Sekolah-create')
                            <!-- <a class="btn btn-success" href="{{ route('Sekolah.create') }}"> Tambah Info Sekolah</a> -->

                            @endcan
                        </div>
                    </div>
                </div>


    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="table-responsive">
    <table class="table" style="color: white; font-size:18px;">
            <tr class="text-center">
                <th width="230px">Nama Sekolah</th>
                <th width="230px">Alamat</th>
                <th>Email</th>
                <th width="120px">No Telepon</th>
                <th>Gambar</th>
                <th width="100px">Action</th>
            </tr>
            @foreach ($Sekolah as $sekolah)
            <tr>
                <td>{{ $sekolah->i_nama }}</td>
                <td>{{ $sekolah->i_alamat }}</td>
                <td>{{ $sekolah->i_email }}</td>
                <td>{{ $sekolah->i_notelp }}</td>
                <td><img src="{{asset('images/sekolah/'.$sekolah->i_foto)}}" width="50%"></td>
                <td width="100px">
                    <form action="{{ route('Sekolah.destroy',$sekolah->id) }}" method="POST">
                        @can('Sekolah-edit')
                        <a class="btn btn-info" href="{{ route('Sekolah.edit',$sekolah->id) }}">Ubah</a>
                        @endcan
                        @csrf
                        @method('DELETE')
                        @can('Siswa-delete')
                        <!-- <button type="submit" class="btn btn-danger">Hapus</button> -->
                        @endcan
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

    </div>
            </div></div></div>



    {!! $Sekolah->render() !!}


    @endsection
