<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>A4</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>
  @page { size: A4 }
  #title{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 16px;
    font-weight:bold;
  }
  .tabeldatakaryawan{
    margin-top: 40px;
  }

  .tabeldatakaryawan tr td{
    padding: 3px;
  }

  .tabelpresensi{
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
  }
  .tabelpresensi tr th{
    border: 1px solid #302f2f;
    padding: 8px;
    background-color: #edebeb
   
  }
  .tabelpresensi tr td{
    border: 1px solid #302f2f;
    padding: 5px;
    font-size: 12px;
  }
  .foto{
    width: 30px;
    height:30px;
  }
  </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4">
  {{-- @php
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
            return $jml_jam . ":" . round($sisamenit2);
        } 
  @endphp --}}

  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">

    <!-- Write HTML just like a web page -->
 <table style="width: 100%" > 
    <tr>
        <td style="width:100px">
            <img src="{{asset('assets/img/raxlogo.png')}}" width="80" height="57" alt="">
        </td>
        <td>
                <span id="title">
                    LAPORAN PRESENSI KARYAWAN<br>
                    PERIODE {{strtoupper($namabulan[ $bulan]) }} {{$tahun}}<br>
                    PT. RESTU ABADI EKSPEDISI<br>
                </span>
            <span>Jln.Karasak Lama, no.106, Bandung</span>
        </td>
    </tr>
 </table>
 <table class="tabeldatakaryawan">
  <tr>
    <td rowspan="5"> 
      @php
          $path = Storage::url('uploads/karyawan/'. $karyawan->foto);
        @endphp
        <img src="{{url($path)}}" alt="" width="80px" height="100px">
    </td>
  </tr>
    <tr>
        <td>NIK</td>
        <td>:</td>
        <td>{{ $karyawan->nik }}</td>   
    </tr>
    <tr>
        <td>Nama Karyawan</td>
        <td>:</td>
        <td>{{ $karyawan->nama_lengkap }}</td>   
    </tr>
    <tr>
        <td>Jabatan</td>
        <td>:</td>
        <td>{{ $karyawan->jabatan }}</td>   
    </tr>
    <tr>
        <td>Divisi</td>
        <td>:</td>
        <td>{{ $karyawan->nama_dept }}</td>   
    </tr>
 </table>
 <table class="tabelpresensi">
  <tr>
    <th>No.</th>
    <th>Tanggal</th>
    <th>Jam Masuk</th>
    <th>Foto In</th>
    <th>Jam Pulang</th>
    <th>Foto Out</th>
    <th>Status</th>
    <th>Keterangan</th>
    <th>Total Jam kerja</th>
  </tr>
  @foreach ($presensi as $d)
  @if ($d->status == "h")
  @php
  $path_in = Storage::url('uploads/absensi/'.$d->foto_in);
  $path_out = Storage::url('uploads/absensi/'.$d->foto_out);
  $jamterlambat = hitungjamkerja($d->jam_masuk,$d->jam_in);  
@endphp
<tr>
<td>{{$loop->iteration}}</td>
<td>{{date("d-m-Y",strtotime($d->tgl_presensi)) }}</td>
<td>{{$d->jam_in}}</td>
<td><img src="{{url($path_in)}}" alt="" class="foto"></td>
<td>{{$d->jam_out != null ? $d->jam_out : 'Belum Absen'}}</td>
<td>
   @if ($d->jam_out != null)
  <img src="{{url($path_out)}}" class="foto" alt="">
  @else 
  No Photo
  @endif
</td>
<td style="text-align: center">{{ $d->status }}</td>
<td>
  @if ($d->jam_in > $d->jam_masuk)
  Terlambat {{$jamterlambat}}
  @else
  <span class="text ">Tepat Waktu</span>  
  @endif
</td>
<td>
  @if ($d->jam_out != null)
    @php
      $tgl_masuk = $d->tgl_presensi;
      $tgl_pulang = $d->lintashari == 1 ? date('Y-m-d', strtotime('+1 days',strtotime($tgl_masuk))) : $tgl_masuk;
      $jam_masuk = $tgl_masuk . ' ' . $d->jam_in;
      $jam_pulang= $tgl_pulang . ' ' . $d->jam_out;

      $jmljamkerja = hitungjamkerja($jam_masuk, $jam_pulang);
    @endphp
  @else
    @php
      $jmljamkerja = 0; 
    @endphp   
  @endif
  {{$jmljamkerja}}
  
</td>

</tr>
@else
<tr>
<td>{{$loop->iteration}}</td>
<td>{{date("d-m-Y",strtotime($d->tgl_presensi)) }}</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td style="text-align: center">{{ $d->status }}</td>
<td>{{ $d->keterangan}}</td>
<td></td>

</tr>


  @endif
 
      
  @endforeach
 </table>
<table width="100%" style="margin-top:100px">
  <tr>
    <td colspan="2" style="text-align: right">Bandung, {{date('d-m-Y')}}</td>
  </tr>
  <tr>
    <td  style="text-align: center; vertical-align:bottom" height="150px">
      <u>Tiwi Nurlinawati</u><br>
      <i><b>HRD</b></i>
    </td>
    <td  style="text-align: center; vertical-align:bottom" >
      <u>Suhendi</u><br>
      <i><b>Direktur</b></i>
    </td>
  </tr>

</table>
  </section>

</body>

</html>