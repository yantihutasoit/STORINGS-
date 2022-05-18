@extends('layouts.app')


@section('content')

<div class="container mt-3" style="background-image: url('images/landing/green.jpg');background-size:cover;">
        <div class="border-success">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pull-left">
                            <h2 class="text-dark">Detail Nilai</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success mb-3" href="{{ route('Nilai.index') }}">Kembali</a>
                        </div>
                    </div>
                </div>


        <div class="table-responsive">
            <table class="table" style="color: black; font-size:18px;">
                <tr>
                    <th>NIS</th>
                    <th>Agama</th>
                    <th>PKN</th>
                    <th>Bahasa Indonesia</th>
                    <th>Bahasa Inggris</th>
                    <th>IPA</th>
                    <th>IPS</th>
                    <th>Matematika</th>
                    <th>SBK</th>
                    <th>Penjas</th>
                    <th>Rata-Rata</th>
                    <th>KKM</th>
                </tr>
                <tr>
                    <td>{{ $Nilai->n_nis }}</td>
                    <td>{{ $Nilai->n_agama }}</td>
                    <td>{{ $Nilai->n_pkn }}</td>
                    <td>{{ $Nilai->n_bindo }}</td>
                    <td>{{ $Nilai->n_bing }}</td>
                    <td>{{ $Nilai->n_ipa }}</td>
                    <td>{{ $Nilai->n_ips }}</td>
                    <td>{{ $Nilai->n_mtk }}</td>
                    <td>{{ $Nilai->n_sbk }}</td>
                    <td>{{ $Nilai->n_penjas }}</td>
                    <td>{{ number_format(($Nilai->n_agama+$Nilai->n_pkn+$Nilai->n_bindo+$Nilai->n_bing+$Nilai->n_ipa+$Nilai->n_ips+$Nilai->n_mtk+$Nilai->n_sbk+$Nilai->n_penjas)/9 ,2) }}</td>
                    <td>{{ $Nilai->kkm }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection
