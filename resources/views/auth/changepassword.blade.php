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
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="contact-form">
                    <h3 class="text-dark"><b>Ganti Password</b></h3><br>
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form class="form" method="POST" action="{{ route('changePassword') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            <label for="current-password">Password Lama</label>
                            <input id="current-password" type="password" class="form-control" name="current-password" required>

                            @if ($errors->has('current-password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password lama') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                    <label for="new-password">Password baru</label>
                                    <input id="new-password" type="password" class="form-control" name="new-password" required>

                                    @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('re-password baru') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="new-password-confirmation">re-password baru</label>
                                    <input id="new-password-confirmation" type="password" class="form-control" name="new-password-confirmation" required>
                                </div>
                            </div>
                        </div>


                        <!-- recaptcha -->
                        <div class="form-group">
                            <label for="captcha">{{ __('Captcha') }}</label>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="captcha">
                                        <span>{!! captcha_img() !!}</span>
                                    </div>
                                </div>

                                <div class="col-md-9">
                                    <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">

                                </div>
                            </div>

                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-success" style="width: 50%;"><i class="fa fa-paper-plane"></i>Simpan</button>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<br><br>
@endsection