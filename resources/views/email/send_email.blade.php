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
                <div class="col-md-8 mx-auto">
                    <div class="contact-form">
                        <h3 class="text-dark"><b>Kirim Email</b></h3><br>
                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                        @endif
                        <form action="{{url('send_email/sendEmailBroadcast')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="inputSubject">Topik</label>
                                <input type="text" name="subject" class="form-control" placeholder="Masukkan Topik Pesan...">
                                @error('subject')
                                <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputMessage">Pesan</label>
                                <textarea name="content" rows="5" class="form-control" placeholder="Masukkan Pesan anda"></textarea>
                                @error('content')
                                <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success" style="width: 50%;"><i class="fa fa-paper-plane"></i>Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
@endsection
