<?php
    function selisih($jam_masuk, $jam_keluar)
        {
            list($h, $m, $s) = explode(":", $jam_masuk);
            $dtAwal = mktime($h, $m, $s, "1", "1", "1");
            list($h, $m, $s) = explode(":", $jam_keluar);
            $dtAkhir = mktime($h, $m, $s, "1", "1", "1");
            $dtSelisih = $dtAkhir - $dtAwal;
            $totalmenit = $dtSelisih / 60;
            $jam = explode(".", $totalmenit / 60);
            $sisamenit = ($totalmenit / 60) - $jam[0];
            $sisamenit2 = $sisamenit * 60;
            $jml_jam = $jam[0];
            return $jml_jam . " jm " . round($sisamenit2) ." mnt";
        } 
?>
@foreach ($presensi as $d)
@php
    $foto_in = Storage::url('uploads/absensi/'.$d->foto_in);
    $foto_out= Storage::url('uploads/absensi/'.$d->foto_out);
@endphp
@if ($d->status=="h")
<tr>
    <td>{{$loop->iteration}}</td>
    <td>
        <span class="rounded-pill badge bg-success">HADIR</span>  
    </td>
    <td>{{$d->nik}}</td>
    <td>{{$d->nama_lengkap}}</td>
    <td>{{$d->kode_cabang}}</td>
    <td>{{$d->kode_dept}}</td>
    
    <td> 
        {{$d->nama_jam_kerja}} 
    </td>
    <td>{{$d->jam_in}}</td>
    <td> @if ($d->foto_in != null)
        <img src="{{url($foto_in)}}" alt="" class="avatar">
        @else 
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-camera-off"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.297 4.289a.997 .997 0 0 1 .703 -.289h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v8m-1.187 2.828c-.249 .11 -.524 .172 -.813 .172h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2h1c.298 0 .58 -.065 .834 -.181" /><path d="M10.422 10.448a3 3 0 1 0 4.15 4.098" /><path d="M3 3l18 18" /></svg>
        @endif
    </td>
    <td>{!! $d->jam_out != null ? $d->jam_out : '<span class="badge bg-light"> N/A</span>'!!}</td>
    <td>
        @if ($d->foto_out != null)
        <img src="{{url($foto_out)}}" class="avatar" alt="">
        @else 
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-camera-off"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.297 4.289a.997 .997 0 0 1 .703 -.289h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v8m-1.187 2.828c-.249 .11 -.524 .172 -.813 .172h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2h1c.298 0 .58 -.065 .834 -.181" /><path d="M10.422 10.448a3 3 0 1 0 4.15 4.098" /><path d="M3 3l18 18" /></svg>
        @endif
       
    </td>
   
    <td>
        @if ($d->jam_in >= $d->jam_masuk)
        @php
        $jamterlambat = selisih($d->jam_masuk, $d->jam_in);
        @endphp
        <span class="badge bg-danger">T: {{$jamterlambat}}</span>
        @else
        <span class="badge bg-success">On Time</span>  
        @endif
    </td>
    <td>
        @if ($d->lokasi_in != NULL)
        <a href="#" class="btn btn-primary tampilkanpeta" id="{{$d->id}}" >
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 18.5l-3 -1.5l-6 3v-13l6 -3l6 3l6 -3v7" /><path d="M9 4v13" /><path d="M15 7v5" /><path d="M21.121 20.121a3 3 0 1 0 -4.242 0c.418 .419 1.125 1.045 2.121 1.879c1.051 -.89 1.759 -1.516 2.121 -1.879z" /><path d="M19 18v.01" /></svg>
        </a>
        @endif
    </td>
    <td>
        <a href="#" class="btn btn-success btn-sm koreksipresensi" nik="{{ $d->nik}}">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-star" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20.982 11.436a9 9 0 1 0 -9.966 9.51" /><path d="M17.8 20.817l-2.172 1.138a.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a.39 .39 0 0 1 -.567 .411l-2.172 -1.138z" /><path d="M12 7v5l1 1" /></svg>
        </a>
    </td>

</tr>
@else
<tr>
    <td>{{$loop->iteration}}</td>
    <td>
        @if ($d->status=="i")
        <span class="badge bg-primary">IZIN</span>  
        @elseif  ($d->status=="s")
        <span class="badge bg-secondary">SAKIT</span> 
        @elseif  ($d->status=="a")
        <span class="badge bg-danger">ALFA</span> 
        @elseif  ($d->status=="c")
        <span class="badge bg-info">CUTI</span> 
        @endif
    </td>
    <td>{{$d->nik}}</td>
    <td>{{$d->nama_lengkap}}</td>
    <td>{{$d->kode_cabang}}</td>
    <td>{{$d->kode_dept}}</td>
  
    <td><span class="badge bg-secondary">N/A </td>
    <td>  <span class="badge bg-secondary">N/A </span></td>
    <td>  <span class="badge bg-secondary">N/A</span></td>
    <td><span class="badge bg-secondary">N/A</span></td>
    <td><span class="badge bg-secondary">N/A</span></td>
   
   
    <td>{{ $d->keterangan}}</td>
    <td></td>
    <td>
        <a href="#" class="btn btn-success btn-sm koreksipresensi " nik="{{ $d->nik}}">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-star" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20.982 11.436a9 9 0 1 0 -9.966 9.51" /><path d="M17.8 20.817l-2.172 1.138a.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a.39 .39 0 0 1 -.567 .411l-2.172 -1.138z" /><path d="M12 7v5l1 1" /></svg>
        </a>
    </td>
    
</tr>
@endif

    
@endforeach

<script>
    $(function(){
        $(".tampilkanpeta").click(function(e){
            var id= $(this).attr("id");
            $.ajax({
                type:'POST',
                url:'/tampilkanpeta',
                data:{
                _token:"{{csrf_token()}}",
                id:id
                },
                cache:false,
                success:function(respond){
                    $("#loadmap").html(respond);
                }
            });
        $("#modal-tampilkanpeta").modal("show");
        });

        $(".koreksipresensi").click(function(e){
            var nik= $(this).attr("nik");
            var tanggal = "{{ $tanggal }}";

        
            $.ajax({
                type:'POST',
                url:'/koreksipresensi',
                data:{
                _token:"{{csrf_token()}}",
                nik:nik,
                tanggal:tanggal
                },
                cache:false,
                success:function(respond){
                    $("#loadkoreksipresensi").html(respond);
                }
            });
        $("#modal-koreksipresensi").modal("show");
        });

    });
</script>