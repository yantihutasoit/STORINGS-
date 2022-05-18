<!-- External JavaScripts
	============================================= -->
	<script src="{{asset('js/jquery.js')}}"></script>
	<script src="{{asset('js/plugins.js')}}"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="{{asset('js/functions.js')}}"></script>
	<script src="{{asset('js/moment.js')}}"></script>
	<script src="{{asset('js/datepicker.js')}}"></script>

	<!-- Include Date Range Picker -->
	<script src="{{asset('js/daterangepicker.js')}}"></script>
	<script>
		$(function() {
			$('.travel-date-group .format').datepicker({
				autoclose: true,
				format: "yyyy-mm-dd",
			});

		});
	</script>

  <script type="text/javascript">
    $(document).ready(function(){
        $(".search-input").on('keyup',function(){
            var _q=$(this).val();
            if(_q.length>=1){
                $.ajax({
                    url:"{{url('searchLive')}}",
                    data:{
                        cari:_q
                    },
                    dataType:'json',
                    success:function(res){
                        var _html='';
                        $.each(res.data,function(index,data){
                            _html+='<table class="table table-bordered"><tr><td>'+data.s_nis+'</td><td>'+data.s_nama+'</td><td>'+data.s_tempat_lahir+'</td><td>'+data.s_tgl_lahir+'</td><td>'+data.s_alamat+'</td><td>'+data.s_gender+'</td><td>'+data.s_kelas+'</td><td>'+data.s_semester+'</td><td><form action="#" method="POST"><a class="btn btn-info" href="#">Ubah</a>@csrf @method("DELETE")<button type="submit" class="btn btn-danger">Hapus</button></form></td></tr></table>';
                        });
                        $(".search-result").html(_html);
                    }
                })
            }
            else{
                return false;
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $(".cari-input").on('keyup',function(){
            var _q=$(this).val();
            if(_q.length>=1){
                $.ajax({
                    url:"{{url('live')}}",
                    data:{
                        search:_q
                    },
                    dataType:'json',
                    success:function(res){
                        var _html='';
                        $.each(res.data,function(index,data){
                            _html+='<table class="table table-bordered"><tr><td>'+data.n_nama+'</td><td>'+data.n_nis+'</td><td>'+85.67+'</td><td>'+data.kkm+'</td><td><form action="#" method="POST"><a class="btn btn-primary" href="#">Lihat</a>'+' <a class="btn btn-info" href="#">Ubah</a>'+' <a class="btn btn-warning" href="#">Kirim email</a>@csrf @method("DELETE")<button type="submit" class="btn btn-danger">Hapus</button></form></td></tr></table>';
                        });
                        $(".search-result").html(_html);
                    }
                })
            }
            else{
                return false;
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){

$(document).on('change','.nis',function () {
    var search=$(this).val();

    var a=$(this).parent();
    console.log(search);
    var op="";
    $.ajax({
        type:'get',
        url:'{!!URL::to('findNis')!!}',
        data:{'s_nis':search},
        dataType:'json',//return data will be json
        success:function(data){
            console.log(data.s_nama);
            $(".hasil").val(data.s_nama);
        },
        error:function(){
        }
    });
    });
});
</script>

<script type="text/javascript">
    $(document).ready(function(){

$(document).on('change','.nis',function () {
    var search=$(this).val();

    var a=$(this).parent();
    console.log(search);
    var op="";
    $.ajax({
        type:'get',
        url:'{!!URL::to('findNamaOrtu')!!}',
        data:{'s_nis':search},
        dataType:'json',//return data will be json
        success:function(data){
            console.log(data.s_nama_ortu);
            $(".result").val(data.s_nama_ortu);
        },
        error:function(){
        }
    });
    });
});
</script>


<script type="text/javascript">
    $(document).ready(function(){

$(document).on('change','.nameortu',function () {
    var search=$(this).val();

    var a=$(this).parent();
    console.log(search);
    var op="";
    $.ajax({
        type:'get',
        url:'{!!URL::to('findNameOrtu')!!}',
        data:{'nama_siswa':search},
        dataType:'json',//return data will be json
        success:function(data){
            console.log(data.name);
            $(".hasil").val(data.name);
        },
        error:function(){
        }
    });
    });
});
</script>
