@extends('layouts.admin.tabler')
@section('content')

<div class="page-header d-print-none">
    <div class="container-fluid">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          
          <h2 class="page-title">
            Data Izin / Sakit
          </h2>
        </div> 
      </div>
    </div>
  </div>
  <div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
               @if(Session::get('success'))
                <div class="alert alert-success">                                   
                    {{Session::get('success')}}
                </div>
                @endif
                @if(Session::get('warning'))
                    <div class="alert alert-warning">                                   
                    {{Session::get('warning')}}
                </div>
                @endif

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="/presensi/izinsakit" method="GET" autocomplete="off">
                    <div class="row">
                        <div class="col-6">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-month" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M7 14h.013" /><path d="M10.01 14h.005" /><path d="M13.01 14h.005" /><path d="M16.015 14h.005" /><path d="M13.015 17h.005" /><path d="M7.01 17h.005" /><path d="M10.01 17h.005" /></svg>
                                </span>
                                <input type="text" value="{{Request('dari')}}"id="dari" value="" class="form-control" name="dari" placeholder="Dari">
                              </div>   
                        </div>

                        <div class="col-6">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-month" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M7 14h.013" /><path d="M10.01 14h.005" /><path d="M13.01 14h.005" /><path d="M16.015 14h.005" /><path d="M13.015 17h.005" /><path d="M7.01 17h.005" /><path d="M10.01 17h.005" /></svg>
                                </span>
                                <input type="text" value="{{Request('sampai')}}" id="sampai" value="" class="form-control" name="sampai" placeholder="Sampai">
                              </div>   
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-month" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M7 14h.013" /><path d="M10.01 14h.005" /><path d="M13.01 14h.005" /><path d="M16.015 14h.005" /><path d="M13.015 17h.005" /><path d="M7.01 17h.005" /><path d="M10.01 17h.005" /></svg>
                                </span>
                                <input type="text" id="nik" value="{{Request('nik')}}" class="form-control" name="nik" placeholder="NIK">
                              </div>  
                        </div>
                    

                   
                        <div class="col-3">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-month" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M7 14h.013" /><path d="M10.01 14h.005" /><path d="M13.01 14h.005" /><path d="M16.015 14h.005" /><path d="M13.015 17h.005" /><path d="M7.01 17h.005" /><path d="M10.01 17h.005" /></svg>
                                </span>
                                <input type="text" id="nama_lengkap" value="{{Request('nama_lengkap')}}" class="form-control" name="nama_lengkap" placeholder="Nama Karyawan">
                              </div>  
                        </div>
                    @role('administrator','user')
                        <div class="col-2">   
                            <div class="form-group">
                                <select name="kode_cabang" id="kode_cabang" class="form-select">
                                    <option value="">All Cabang</option>
                                    @foreach ($cabang as $d)
                                    <option {{Request('kode_cabang') == $d->kode_cabang ? 'selected' : ''}} value="{{ $d->kode_cabang }}">{{ strtoupper($d->nama_cabang) }}</option>       
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-2">  
                          <div class="form-group">
                              <select name="kode_dept" id="kode_dept" class="form-select">
                                  <option value="">All Divisi</option>
                                  @foreach ($departemen as $d)
                                  <option {{Request('kode_dept') == $d->kode_dept ? 'selected' : ''}} value="{{ $d->kode_dept }}">{{ strtoupper($d->nama_dept) }}</option>       
                                  @endforeach
                              </select>
                          </div>
                      </div>
                    @endrole
                        <div class="col-2">
                            <div class="form-group">
                                <select name="status_approved" id="status_approved" class="form-select">
                                    <option value="">Pilih Status</option>
                                    <option value="0"{{Request('status_approved')=== '0' ? 'selected':''}}>Pending</option>
                                    <option value="1"{{Request('status_approved')== 1 ? 'selected':''}}>Disetujui</option>
                                    <option value="2"{{Request('status_approved')== 2 ? 'selected':''}}>Ditolak</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Izin</th>
                            <th>Tanggal</th>
                            <th>Nik</th>
                            <th>Nama Karyawan</th>
                            <th>Jabatan</th>
                            <th>Divisi</th>
                            <th>Cabang</th>
                            <th>Jenis</th>
                            <th>Keterangan</th>
                            <th>Status Approve</th>
                            @role('administrator','user')
                            <th>Aksi</th>
                            @endrole
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($izinsakit as $d)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$d->kode_izin}}</td>
                                <td>{{date('d-m-Y', strtotime($d->tgl_izin_dari)) }} s/d {{date('d-m-Y', strtotime($d->tgl_izin_sampai)) }}</td>
                                <td>{{$d->nik}}</td>
                                <td>{{$d->nama_lengkap}}</td>
                                <td>{{$d->jabatan}}</td>
                                <td>{{$d->kode_dept}}</td>
                                <td>{{$d->kode_cabang}}</td>
                                <td>{{$d->status == "i" ? "izin" : "sakit"}}</td>
                                <td>{{$d->keterangan}}</td>
                                
                                <td>
                                    @if ($d->status_approved == 1)
                                    <span class="badge bg-success">Disetujui</span>
                                    @elseif ($d->status_approved == 2)
                                    <span class="badge bg-danger">Ditolak</span>
                                    @else
                                    <span class="badge bg-sm bg-warning">Pending </span>
                                    @endif
                                </td>
                                @role('administrator','user')
                                <td>
                                    @if ($d->status_approved == 0)
                                    <a href="#" class="btn btn-sm  btn-primary approve" kode_izin="{{$d->kode_izin}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-external-link" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6" /><path d="M11 13l9 -9" /><path d="M15 4h5v5" /></svg>Detail</a>
                             
                                    @else
                                       <a href="/presensi/{{$d->kode_izin}}/batalkanizinsakit" class="btn btn-sm btn-danger"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-license-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 1 0 4 0v-2m0 -4v-8a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -.864 .126m-2.014 2.025a3 3 0 0 0 -.122 .849v11" /><path d="M11 7h2" /><path d="M9 11h2" /><path d="M3 3l18 18" /></svg>Batalkan</a> 
                                    @endif
                                       </td>
                                       @endrole
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$izinsakit->links('vendor.pagination.bootstrap-5')}}
            </div>
        </div>
    </div>
</div>

<style>
    .badge {
        color: rgb(246, 255, 0); /* warna teks yang diinginkan */
        /* tambahkan properti lain sesuai kebutuhan */
    }
</style>

<div class="modal modal-blur fade" id="modal-izinsakit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Izin/Sakit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" >
            <form action="/presensi/approveizinsakit" method="POST">
                @csrf
                <input type="hidden" id="kode_izin_form" name="kode_izin_form">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <select name="status_approved" id="status_approved" class="form-select">
                                <option value="1">Disetujui</option>
                                <option value="2">Ditolak</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="form-group">
                            <button class="btn btn-primary w-100" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14l11 -11" /><path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" /></svg>
                            Submit
                            </button>
                        </div>
                    </div>
                </div>
            </form>
          
        </div>
        
      </div>
    </div>
  </div>

@endsection

@push('myscript')

<script>
    $(function(){
        $(".approve").click(function(e){
            e.preventDefault();
            var kode_izin= $(this).attr("kode_izin");
            $('#kode_izin_form').val(kode_izin);
            $("#modal-izinsakit").modal("show");
        });
        $("#dari,#sampai").datepicker({ 
        autoclose: true, 
        todayHighlight: true,
        format: 'yyyy-mm-dd'
  });
    });
</script>
    
@endpush
