@extends('layouts.app')


@section('content')
<section>
    <div class="container mt-5" style="background-image: url('images/landing/green.jpg');background-size:cover;">
        <div class="border-success">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2 class="text-light">Data Pengguna</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('users.create') }}"> Tambah Pengguna</a>
                            <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-warning">Import Excel</a>
                        </div>
                    </div>
                </div><br>


                @if ($message = Session::get('success'))
                <div class="alert alert-success mt-2">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="table-responsive">
                    <table class="table" style="color: white; font-size:18px;">
                        <tr>
                            <th>No</th>
                            <th>Nama Orang Tua</th>
                            <th>Nama Siswa</th>
                            <th>Email</th>
                            <th class="text-center">Roles</th>
                            <th class="text-center" width="280px">Action</th>
                        </tr>
                        @foreach ($data as $key => $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->nama_siswa }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-center">
                                @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                <label class="badge badge-light">{{ $v }}</label>
                                @endforeach
                                @endif
                            </td>
                            <td class="text-center">
                                <!-- <a class="btn btn-primary" href="{{ route('users.show',$user->id) }}">Lihat</a> -->
                                <a class="btn btn-info" href="{{ route('users.edit',$user->id) }}">Ubah</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
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
                    <form action="{{ route('file-import') }}" method="post" enctype="multipart/form-data">
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
    </div><br>
    <div class="container">
        {!! $data->render() !!}
    </div>
</section>
<br>

@endsection
