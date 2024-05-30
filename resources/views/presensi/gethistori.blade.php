<style>
    .historicontent{
        display: flex;
        margin-top: 10px;
    }
    .datapresensi{
        margin-left: 10px;
    }
    .card{
        border: 1px solid rgb(51, 157, 255);
    }
</style>


@if ($histori->isEmpty())
<div class="alert alert-outline-warning">
    <p>Data Belum Ada!</p>
</div> 
@endif

@foreach ($histori as $d)
@if ($d->status =="h") 
           <div class="card historicard mb-1">
            <div class="card-body">
                <div class="historicontent">
                    <div class="iconpresensi">
                        <ion-icon name="finger-print-outline" style="font-size: 48px;" class="text-success"></ion-icon>
                    </div>
                    <div class="datapresensi">
                        <h3 style="line-height:2px">{{$d->nama_jam_kerja}}</h3>
                        <h4 style="margin:0px !important ">{{date("d-m-Y",strtotime($d->tgl_presensi)) }}</h4>
                        
                        <span> 
                            {!! $d->jam_in != null ? date("H:i",strtotime($d->jam_in)) : '<span class="text-danger">Belum Scan</span>' !!}                                
                            {!! $d->jam_out != null ? "-" .date("H:i",strtotime($d->jam_out)) : '<span 
                            class="text-danger">- Belum Scan</span>' !!}
                        </span>
                        <div id="keterangan" class="mt-1" >
                            @php
                                $jam_in = date("H:i",strtotime($d->jam_in));
                                $jam_masuk = date("H:i",strtotime($d->jam_masuk));

                                $jadwal_jam_masuk = $d->tgl_presensi. " ".$jam_masuk;
                                $jam_presensi = $d->tgl_presensi."".$jam_in;
                            @endphp
                            @if ($jam_in > $jam_masuk)
                            @php
                                $jmlterlambat = hitungjamterlambat($jadwal_jam_masuk,$jam_presensi);
                                $jmlterlambatdesimal = hitungjamterlambatdesimal($jadwal_jam_masuk,$jam_presensi);
                            @endphp
                              <span class="danger">Terlambat {{$jmlterlambat}} ({{$jmlterlambatdesimal}} jam)</span>  
                            @else
                                <span class="color:success">Tepat Waktu</span>  
                            @endif

                        </div>    
                    </div>
                </div>
            </div>
        </div>
        @elseif ($d->status =="i")   
        <div class="card historicard mb-1">
            <div class="card-body">
                <div class="historicontent">
                    <div class="iconpresensi">
                        <ion-icon name="walk-outline" style="font-size: 48px;" class="text-info"></ion-icon>
                    </div>
                    <div class="datapresensi">
                        <h3 style="line-height:2px">IZIN </h3>
                        <h4 style="margin:0px !important ">{{date("d-m-Y",strtotime($d->tgl_presensi)) }}</h4>
                        <span>
                            No Izin : {{ $d->kode_izin}}
                        </span>
                        <br>
                        <span> 
                           Ket : {{$d->keterangan}}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        @elseif ($d->status =="s")   
        <div class="card historicard mb-1">
            <div class="card-body">
                <div class="historicontent">
                    <div class="iconpresensi">
                        <ion-icon name="medkit-outline" style="font-size: 48px;" class="text-warning"></ion-icon>
                    </div>
                    <div class="datapresensi">
                        <h3 style="line-height:2px">SAKIT </h3>
                        <h4 style="margin:0px !important ">{{date("d-m-Y",strtotime($d->tgl_presensi)) }}</h4>
                        <span>No Izin : {{ $d->kode_izin}}</span>
                        <br>
                        <span> 
                          Ket : {{$d->keterangan}}
                        </span>
                        <br>
                        @if (!empty($d->doc_sid))
                        <span style="color:blue">
                            <ion-icon name="document-attach-outline"></ion-icon>
                        Surat Ket Dokter
                        </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @elseif ($d->status =="c")   
        <div class="card historicard mb-1">
            <div class="card-body">
                <div class="historicontent">
                    <div class="iconpresensi">
                        <ion-icon name="storefront-outline" style="font-size: 48px;" class="text-blue"></ion-icon>
                    </div>
                    <div class="datapresensi">
                        <h3 style="line-height:2px">CUTI - {{ $d->nama_cuti}}</h3>
                        <h4 style="margin:0px !important ">{{date("d-m-Y",strtotime($d->tgl_presensi)) }}</h4>
                        <span class="text-info">No Izin : {{$d->kode_izin}}</span>
                        <br>
                        <span> 
                           Ket : {{$d->keterangan}}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    
           @endif
    
@endforeach