@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          
          <h2 class="page-title">
            Rekap Presensi
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
                        <form action="/presensi/cetakrekap" target="_blank" method="POST">
                            @csrf
                            @role('administrator','user')
                            <div class="row mt-1">
                                <div class="col-12">
                                  <div class="form-group">
                                    <select name="kode_cabang" id="kode_cabang" class="form-select">
                                      <option value="">Semua Cabang</option>
                                      @foreach ($cabang as $d)
                                      <option 
                                        value="{{$d->kode_cabang}}">{{ strtoupper($d->nama_cabang)}}
                                      </option>
                                      @endforeach
                                    </select>
                            
                                  </div>
                                </div>
                              </div>
                              @else
                              <input type="hidden" name="kode_cabang" value="{{Auth::user()->kode_cabang}}">
                              @endrole
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="bulan" id="bulan" class="form-select">
                                            <option value="">Bulan</option>
                                            @for ($i = 1; $i <= 12; $i++) <option value="{{$i}}" {{date("m")==$i ? 'selected':'' }}>{{$namabulan[$i]}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="tahun" id="tahun" class="form-select">
                                            <option value="">Tahun</option>
                                            @php
                                            $tahunmulai = 2022;
                                            $tahunskrg = date("Y");
                                        @endphp
                                        @for ($tahun = $tahunmulai; $tahun <= $tahunskrg; $tahun++) <option value="{{$tahun}}"{{date("Y")==$tahun ? 'selected':'' }}>{{$tahun}}
                                        </option>
                                        @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @role('administrator','user')
                           <div class="row mt-2">
                            <div class="col-12">
                                <div class="form-group">
                                    <select name="kode_dept" id="kode_dept" class="form-select">
                                        <option value="">Semua Divisi</option>
                                        @foreach ($departemen as $d)
                                            <option value="{{ $d->kode_dept }}">{{ $d->nama_dept}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                           </div>
                           @else
                           <input type="hidden" name="kode_dept" value="{{Auth::guard('user')->user()->kode_dept}}">
                        @endrole

                            
                            <div class="row mt-2">
                                <div class="col-6">
                                    <div class="form-group">
                                       <button type="submit" name="cetak" class="btn btn-primary w-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-printer" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" /></svg>
                                      Cetak
                                    </button>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                       <button type="submit" name="exportexcel" class="btn btn-success w-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-spreadsheet" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M8 11h8v7h-8z" /><path d="M8 15h8" /><path d="M11 11v7" /></svg>
                                      Export Ke Excel
                                    </button>
                                    </div>
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

