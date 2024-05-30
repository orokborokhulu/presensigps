@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          
          <h2 class="page-title">
            Koordinat Lokasi Kantor
          </h2>
        </div> 
      </div>
    </div>
  </div>
  <div class="page-body">
    <div class="container-xl">

    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
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
                        <form action="/konfigurasi/updatelokasikantor"  method="POST">
                            @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="input-icon mb-3">
                                                    <span class="input-icon-addon">
                                                      <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 18.5l-3 -1.5l-6 3v-13l6 -3l6 3l6 -3v7" /><path d="M9 4v13" /><path d="M15 7v5" /><path d="M21.121 20.121a3 3 0 1 0 -4.242 0c.418 .419 1.125 1.045 2.121 1.879c1.051 -.89 1.759 -1.516 2.121 -1.879z" /><path d="M19 18v.01" /></svg>
                                                    </span>
                                                    <input type="text" id="lokasi_kantor" value="{{$lok_kantor->lokasi_kantor}}" name="lokasi_kantor" class="form-control" placeholder="Koordinat kantor">
                                                  </div>
                                            </div>
                                        </div>
                            

                          
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="input-icon mb-3">
                                                    <span class="input-icon-addon">
                                                      <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-flightradar24" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 12m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" /><path d="M8.5 20l3.5 -8l-6.5 6" /><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                                                    </span>
                                                    <input type="text" id="radius" value="{{$lok_kantor->radius}}" name="radius" class="form-control" placeholder="Radius jarak absensi dari kantor (dalam Meter)">
                                                  </div>
                                            </div>
                                        </div>
                            

                           
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="input-icon mb-3">
                                                    <span class="input-icon-addon">
                                                      <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-flightradar24" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 12m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" /><path d="M8.5 20l3.5 -8l-6.5 6" /><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                                                    </span>
                                                    <input type="text" id="cabang" value="{{$lok_kantor->cabang}}" name="cabang" class="form-control" placeholder="Kantor Cabang">
                                                  </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <button class="btn btn-primary w-100"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" /><path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" /></svg>Update</button>
                                            </div>
                                        </div>
                           
                           
                           
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

