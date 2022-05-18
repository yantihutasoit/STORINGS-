@extends('layouts.app')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/min.css')}}" type="text/css" />
    <style>
        body {
            color: #000;
            font-family: "Roboto", sans-serif;
        }

        .contact-form {
            padding: 15px;
            margin: 15px auto;
        }

        .contact-form h1 {
            font-size: 42px;
            margin: 0 0 50px;
        }

        .contact-form .form-group {
            margin-bottom: 20px;
        }

        .contact-form .form-control,
        .contact-form .btn {
            min-height: 40px;
            border-radius: 2px;
        }

        .contact-form .form-control {
            border-color: #e2c705;
        }

        .contact-form .form-control:focus {
            border-color: #d8b012;
            box-shadow: 0 0 8px #dcae10;
        }

        .contact-form .btn-primary,
        .contact-form .btn-primary:active {
            min-width: 250px;
            color: #fcda2e;
            background: #000 !important;
            margin-top: 20px;
            border: none;
        }

        .contact-form .btn-primary:hover {
            color: #fff;
        }

        .contact-form .btn-primary i {
            margin-right: 5px;
        }

        .contact-form label {
            opacity: 0.9;
        }

        .contact-form textarea {
            resize: vertical;
        }

        .bs-example {
            margin: 20px;
        }
    </style>
</head>

<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-form">
                        <h3 class="text-dark"><b>Kirim Nilai</b></h3><br>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('Nilai.index') }}"> Kembali</a>
                        </div><br>

                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                        @endif
                        <form action="{{url('send_email/send')}}" method="post">
                            @csrf
                            @foreach($Nilai as $nilai)
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName">Nama</label>
                                        <input type="text" name="name" class="form-control" value="{{$nilai->n_nama}}">
                                        @error('name')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input name="email" class="form-control" value="{{ $nilai->email }}">
                                        @error('email')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSubject">Topik</label>
                                <input type="text" name="subject" class="form-control" value="Laporan Nilai Siswa">
                                @error('subject')
                                <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputMessage">Pesan</label>
                                <textarea name="content" rows="5" class="form-control">Berikut kami lampirkan nilai dari siswa:<br>
Nama&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; : {{ $nilai->n_nama }} <br>
Nomor Induk Siswa : {{ $nilai->n_nis }}<br><br>
Nilai Agama&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;: {{ $nilai->n_agama }}<br>
Nilai Pkn&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;: {{ $nilai->n_pkn}}<br>
Nilai Bahasa Indonesia&emsp;&nbsp;: {{ $nilai->n_bindo}}<br>
Nilai Bahasa Inggris&emsp;&emsp;&ensp;: {{ $nilai->n_bing }}<br>
Nilai IPA&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;: {{ $nilai->n_ipa}}<br>
Nilai IPS&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;: {{ $nilai->n_ips}}<br>
Nilai Matematika&emsp;&emsp;&emsp;&emsp;: {{ $nilai->n_mtk }}<br>
Nilai Seni Budaya&emsp;&emsp;&emsp;&emsp;: {{ $nilai->n_sbk}}<br>
Nilai Pendidikan Jasmani&ensp;: {{ $nilai->n_penjas}}<br>
Nilai KKM&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;: {{ $nilai->kkm}}<br>
Nilai Rata-rata&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;: {{ number_format(($nilai->n_agama+$nilai->n_pkn+$nilai->n_bindo+$nilai->n_bing+$nilai->n_ipa+$nilai->n_ips+$nilai->n_mtk+$nilai->n_sbk+$nilai->n_penjas)/9 ,2)}}<br><br>
Atas perhatian Bapak/Ibu, kami ucapkan terima kasih.</textarea>
                                @error('content')
                                <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success" style="width: 50%;"><i class="fa fa-paper-plane"></i>Kirim</button>
                            </div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
@endsection
