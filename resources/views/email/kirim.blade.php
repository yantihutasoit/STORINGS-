<div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header">Salam sejahtera bagi kita semua.</div>
                   <div class="card-body">
                    @if (session('resent'))
                         <div class="alert alert-success" role="alert">
                            {{ __('Email sudah dikirim') }}
                        </div>
                    @endif
                    {!! $content !!}
                </div>
            </div>
        </div>
    </div>
</div>