@extends('layouts.presensi')
@section('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
<style>
    .datepicker-modal{
        max-height:460px !important;
    }
    .datepicker-date-display{
        background-color: rgb(216, 7, 7) !important;
    }
#keterangan{
    height: 8rem !important;
}



</style>
<!--start App header -->
<div class="appHeader bg-danger text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline" ></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Edit Izin Cuti</div>
    <div class="right"></div>
</div>
<!--end App header -->  
@section('content')
<div class="row" style="margin-top:70px">
    <div class="col">
        <form method="POST" action="/izincuti/{{ $dataizin->kode_izin}}/update" id="frmizincuti">
            @csrf
            <div class="form-group">
                <select name="kode_cuti" id="kode_cuti" class="form-control selectmaterialize">
                    <option value="">Pilih Kategori Cuti</option>
                    @foreach ($mastercuti as $c)
                    <option {{$dataizin->kode_cuti == $c->kode_cuti ?'selected':''}} value="{{ $c->kode_cuti}}">{{ $c->nama_cuti }}</option>    
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="text" id="tgl_izin_dari" value="{{$dataizin->tgl_izin_dari}}" name="tgl_izin_dari" class="form-control datepicker" autocomplete="off"  placeholder="Dari">
            </div>
            <div class="form-group">
                <input type="text" id="tgl_izin_sampai" value="{{$dataizin->tgl_izin_sampai}}"name="tgl_izin_sampai" class="form-control datepicker" autocomplete="off"  placeholder="Sampai">
            </div>
            <div class="form-group">
                <input type="text" id="jml_hari" name="jml_hari" class="form-control " autocomplete="off"  placeholder="Jumlah Hari" readonly>
            </div>
            
            <div class="form-group">
                <input type="text" id="keterangan" value="{{$dataizin->keterangan}}" name="keterangan" class="form-control " autocomplete="off"  placeholder="Keterangan" >
            </div>
            <div class="form-group">
                <button class="btn btn-primary w-100">Kirim</button>
            </div>
        </form>
    </div>
</div>  
@endsection
@push('myscript')
<script>
    var currYear = (new Date()).getFullYear();

    $(document).ready(function(){
        $(".datepicker").datepicker({
            
            format: "yyyy/mm/dd"
        });

        function loadjumlahhari(){
            var dari = $("#tgl_izin_dari").val();
            var sampai = $("#tgl_izin_sampai").val();
            var date1 = new Date(dari);
            var date2 = new Date(sampai);

            var Difference_In_Time = date2.getTime() - date1.getTime();

            var Differences_In_Days = Difference_In_Time / (1000 * 3600 * 24);

            if(dari=="" || sampai ==""){
                var jmlhari = 0;
            }else{
                var jmlhari = Differences_In_Days +1;
            }
            

            $("#jml_hari").val(jmlhari + " Hari");
        }
        
        loadjumlahhari();

        $("#tgl_izin_dari,#tgl_izin_sampai").change(function(e){
            loadjumlahhari();
        });


        // $("#tgl_izin").change(function(e){
        //     var tgl_izin = $(this).val();
        //     $.ajax({
        //         type:'POST',
        //         url:'/presensi/cekpengajuanizin',
        //         data:{
        //             _token: "{{csrf_token()}}",
        //             tgl_izin: tgl_izin

        //         },
        //         cache: false,
        //         success:function(respond){
        //             if(respond==1){
        //                 Swal.fire({
        //             title: 'Oops!',
        //             text: 'Tanggal Ini anda sudah Mengajukan Form Izin!',
        //             icon: 'warning',
        //                 }).then((result) => {
        //                     $("#tgl_izin" ).val("");
        //                 });
        //             }
        //         }
        //     });
        // });

        $("#frmizincuti").submit(function(){
        var kode_cuti = $("#kode_cuti").val();  
        var tgl_izin_dari = $("#tgl_izin_dari").val();
        var tgl_izin_sampai = $("#tgl_izin_sampai").val();
        var keterangan = $("#keterangan").val();
        if(kode_cuti==""){
            Swal.fire({
                    title: 'Oops!',
                    text: 'Kategori Cuti harus Dipilih!',
                    icon: 'warning',
                })
            return false;
        }
        else if(tgl_izin_dari =="" || tgl_izin_sampai ==""){
            Swal.fire({
                    title: 'Oops!',
                    text: 'Pilih Tanggal terlebih Dahulu!',
                    icon: 'warning',
                })
            return false;
        } else if(keterangan==""){
            Swal.fire({
                    title: 'Oops!',
                    text: 'Keterangan harus Diisi!',
                    icon: 'warning',
                })
            return false;
        }
        });
    });
</script> 
@endpush