@extends('layouts.admin.tabler')
@section('content')

<style>
  .badge {
      color: rgb(255, 255, 0); /* warna teks yang diinginkan */
      /* tambahkan properti lain sesuai kebutuhan */
  }
</style>


<div class="page-header d-print-none">
    <div class="container-fluid">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          
          <h2 class="page-title">
            Monitoring Presensi
          </h2>
        </div> 
      </div>
    </div>
  </div>
  <div class="page-body">
    <div class="container-fluid">
        <div class="row">
           <div class="col-12">
            <div class="card">
                <div class="card-body">
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
                      @role('administrator','user')
                        <div class="col-4">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-month" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M7 14h.013" /><path d="M10.01 14h.005" /><path d="M13.01 14h.005" /><path d="M16.015 14h.005" /><path d="M13.015 17h.005" /><path d="M7.01 17h.005" /><path d="M10.01 17h.005" /></svg>
                                </span>
                                <input type="text" id="tanggal" name="tanggal" value="{{ date("Y-m-d") }}" class="form-control"  placeholder="Tanggal Presensi" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-4">   
                            <div class="form-group">
                                <select name="kode_cabang" id="kode_cabang" class="form-select">
                                    <option value="">All Cabang</option>
                                    @foreach ($cabang as $d)
                                    <option value="{{ $d->kode_cabang }}">{{ strtoupper($d->nama_cabang) }}</option>       
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">  
                          <div class="form-group">
                              <select name="kode_dept" id="kode_dept" class="form-select">
                                  <option value="">All Divisi</option>
                                  @foreach ($departemen as $d)
                                  <option value="{{ $d->kode_dept }}">{{ strtoupper($d->nama_dept) }}</option>       
                                  @endforeach
                              </select>
                          </div>
                      </div>
                        @else
                        <div class="col-12">
                          <div class="input-icon mb-3">
                              <span class="input-icon-addon">
                                <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-month" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M7 14h.013" /><path d="M10.01 14h.005" /><path d="M13.01 14h.005" /><path d="M16.015 14h.005" /><path d="M13.015 17h.005" /><path d="M7.01 17h.005" /><path d="M10.01 17h.005" /></svg>
                              </span>
                              <input type="text" id="tanggal" name="tanggal" value="{{ date("Y-m-d") }}" class="form-control"  placeholder="Tanggal Presensi" autocomplete="off">
                          </div>
                      </div>
                        @endrole
                        
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-stripped table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Status</th>
                                        <th>NIK</th>
                                        <th>Nama Karyawan</th>
                                        <th>Cabang</th>
                                        <th>Divisi</th>
                                        <th>Jadwal</th>
                                        <th>Jam Masuk</th>
                                        <th>Foto In</th>
                                        <th>Jam Pulang</th>
                                        <th>Foto Out</th>
                                        <th>Ket</th>
                                        <th>Location</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="loadpresensi">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
           </div>
        </div>
    </div>
</div>
{{--modal show map--}}
<div class="modal modal-blur fade" id="modal-tampilkanpeta" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Lokasi Presensi user</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="loadmap">
        
      </div>
      
    </div>
  </div>
</div>

{{--modal form koreksi presensi--}}
<div class="modal modal-blur fade" id="modal-koreksipresensi" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Koreksi Presensi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="loadkoreksipresensi">
        
      </div>
      
    </div>
  </div>
</div>
@endsection
@push('myscript')
<script>
$(function () {
  $("#tanggal").datepicker({ 
        autoclose: true, 
        todayHighlight: true,
        format: 'yyyy-mm-dd'
  });

  function loadpresensi(){
    var tanggal = $("#tanggal").val();
    var kode_cabang = $("#kode_cabang").val();
    var kode_dept = $("#kode_dept").val();
    $.ajax({
        type:'POST',
        url:'/getpresensi',
        data:{
        _token:"{{ csrf_token() }}",
        tanggal: tanggal,
        kode_cabang: kode_cabang,
        kode_dept: kode_dept
        },
        cache:false,
        success:function(respond){
            $("#loadpresensi").html(respond);
        }
    });
  }
  $("#tanggal").change(function(e){
    loadpresensi();
    
  });
  $("#kode_cabang").change(function(e){
    loadpresensi();
  });
  $("#kode_dept").change(function(e){
    loadpresensi();
  });
  loadpresensi();

});

</script>

    
@endpush