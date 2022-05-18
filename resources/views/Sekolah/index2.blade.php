@extends('layouts.app')


@section('content')
<section id="content">
    @foreach ($Sekolah as $sekolah)
    <section id="page-title" class="page-title-parallax page-title-dark" style="padding: 250px 0; background-image: url('{{asset('images/sekolah/'.$sekolah->i_foto)}}'); background-size: cover;">
    </section><!-- #content end -->

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="col_full">
                <div class="heading-block center nobottomborder">
                    <h2>{{ $sekolah->i_nama }}</h2>
                    <span>Lokasi:{{ $sekolah->i_alamat }}</span>
                </div>
                <div class="promo promo-light bottommargin">
                    <h4 class="text-center">Hubungi kami di nomor <span>{{ $sekolah->i_notelp }}</span> atau kirim email melalui <span>{{ $sekolah->i_email }}</span></h4>
                </div>

            </div>
            @endforeach

        </div>

    </div>

</section><!-- #content end -->


@endsection
{!! $Sekolah->render() !!}
