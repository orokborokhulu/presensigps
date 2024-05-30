@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          
          <h2 class="page-title">
            Data Karyawan
          </h2>
        </div> 
      </div>
    </div>
  </div>
  <div class="page-body">
    <div class="container-xl">
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

                        @role('administrator','user')
                        <div class="row">
                            <div class="col-12">
                                <a href="#" class="btn btn-primary" id="btnTambahKaryawan"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                    Tambah data
                                </a>
                            </div>
                        </div>
                        @endrole
                        <div class="row mt-2">
                            <form action="/karyawan" method="GET">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <input type="text" name="nama_karyawan" class="form-control" placeholder="Cari Nama Karyawan">
                                        </div>
                                    </div>
                                    @role('administrator','user')
                                    <div class="col-3">
                                        <div class="form-group">
                                            <select name="kode_dept" id="kode_dept" class="form-select">
                                                <option value="">Divisi</option>
                                                @foreach ($departemen as $d)
                                                <option {{ Request('kode_dept') == $d->kode_dept ? 'selected' : '' }} value="{{ $d->kode_dept }}">{{ strtoupper($d->nama_dept) }}</option>
                                                    
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <select name="kode_cabang" id="kode_cabang" class="form-select">
                                                <option value="">All Cabang</option>
                                                @foreach ($cabang as $d)
                                                <option {{ Request('kode_cabang') == $d->kode_cabang ? 'selected' : '' }} value="{{ $d->kode_cabang }}">{{ strtoupper($d->nama_cabang) }}</option>
                                                    
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endrole

                                    <div class="col-2">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                                           Cari
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>No HP</th>
                                            <th>Foto</th>
                                            <th>Cabang</th>
                                            <th>Divisi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($karyawan as $d)
                                        @php
                                            $path = Storage::url('uploads/karyawan/'.$d->foto);
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration + $karyawan->firstItem()-1 }}</td>
                                            <td>{{$d->nik}}</td>
                                            <td>{{$d->nama_lengkap}}</td>
                                            <td>{{$d->jabatan}}</td>
                                            <td>{{$d->no_hp}}</td>
                                            <td>
                                                @if (empty($d->foto))
                                                    <img src="{{asset('assets/img/nophoto.png')}}"class="avatar" alt="">
                                                @else
                                                <img src="{{url($path)}}" class="avatar" alt="">
                                                @endif
                                            </td>
                                            <td>{{$d->kode_cabang}}</td>
                                            <td>{{$d->nama_dept}}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div>
                                                        @role('administrator','user')
                                                        <a href="#" class="edit btn btn-info btn-sm " nik="{{$d->nik}}" >
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                                        </a>
                                                  @endrole
                                                        <a href="/konfigurasi/{{$d->nik}}/setjamkerja" class="S btn btn-success btn-sm ml-2"  >
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-star" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20.982 11.436a9 9 0 1 0 -9.966 9.51" /><path d="M17.8 20.817l-2.172 1.138a.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a.39 .39 0 0 1 -.567 .411l-2.172 -1.138z" /><path d="M12 7v5l1 1" /></svg>
                                                            </a>
                                                                <a href="/karyawan/{{ Crypt::encrypt($d->nik) }}/resetpassword" class="S btn btn-warning btn-sm ml-2"  >
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-key-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.17 6.159l2.316 -2.316a2.877 2.877 0 0 1 4.069 0l3.602 3.602a2.877 2.877 0 0 1 0 4.069l-2.33 2.33" /><path d="M14.931 14.948a2.863 2.863 0 0 1 -1.486 -.79l-.301 -.302l-6.558 6.558a2 2 0 0 1 -1.239 .578l-.175 .008h-1.172a1 1 0 0 1 -.993 -.883l-.007 -.117v-1.172a2 2 0 0 1 .467 -1.284l.119 -.13l.414 -.414h2v-2h2v-2l2.144 -2.144l-.301 -.301a2.863 2.863 0 0 1 -.794 -1.504" /><path d="M15 9h.01" /><path d="M3 3l18 18" /></svg> 
                                                            </a>
                                                        </div>
                                                        <div>
                                                        <form action="/karyawan/{{$d->nik}}/delete" method="POST" style="margin-left: 5px">
                                                        @csrf
                                                        @role('administrator','user')
                                                        <a href="#" class="btn btn-danger btn-sm delete-confirm">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg> 
                                                        </a>
                                                        @endrole
                                                        </form>
                                                    </div>

                                                </div>
                                                
                                            </td>
                                        </tr>
                                            
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        
                        {{$karyawan->links('vendor.pagination.bootstrap-5')}}
                    </div>
                </div>

                
            </div>
        </div>

    </div>
    
  </div>
{{--modal add karyawan--}}
  <div class="modal modal-blur fade" id="modal-inputkaryawan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data Karyawan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/karyawan/store" method="POST" id="frmkaryawan" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                          <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7v-1a2 2 0 0 1 2 -2h2" /><path d="M4 17v1a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v1" /><path d="M16 20h2a2 2 0 0 0 2 -2v-1" /><path d="M5 11h1v2h-1z" /><path d="M10 11l0 2" /><path d="M14 11h1v2h-1z" /><path d="M19 11l0 2" /></svg>
                        </span>
                        <input type="text" maxlength="10"  id="nik" value="" name="nik" class="form-control" placeholder="Nik">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                          <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h3.5" /><path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z" /></svg>
                        </span>
                        <input type="text" id="nama_lengkap" value="" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap">
                      </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                          <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-subtask" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 9l6 0" /><path d="M4 5l4 0" /><path d="M6 5v11a1 1 0 0 0 1 1h5" /><path d="M12 7m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z" /><path d="M12 15m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z" /></svg>
                        </span>
                        <input type="text" id="jabatan" value="" class="form-control" name="jabatan" placeholder="Jabatan">
                      </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                          <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" /></svg>
                        </span>
                        <input type="text" id="no_hp" value="" class="form-control" name="no_hp" placeholder="Nomor HP">
                      </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-12"> 
                        <input type="file" name="foto" class="form-control">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <select name="kode_dept" id="kode_dept" class="form-select">
                        <option value="">Divisi</option>
                        @foreach ($departemen as $d)
                        <option {{Request('kode_dept')==$d->kode_dept ? 'selected' : '' }} value="{{$d->kode_dept}}">{{$d->nama_dept}}</option>   
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12">
                    <select name="kode_cabang" id="kode_cabang" class="form-select">
                        <option value="">Cabang</option>
                        @foreach ($cabang as $d)
                        <option  value="{{$d->kode_cabang}}">{{ strtoupper($d->nama_cabang)}}</option>   
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="form-group">
                        <button class="btn btn-primary w-100"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M14 4l0 4l-6 0l0 -4" /></svg>
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>

{{--modal edit karyawan--}}
<div class="modal modal-blur fade" id="modal-editkaryawan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Data Karyawan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="loadeditform">
          
        </div>
        
      </div>
    </div>
  </div>

@endsection

@push('myscript')
<script>
    $(function(){

        $("#nik").mask("0000000000");
        $("#no_hp").mask("0000000000000");

        $("#btnTambahKaryawan").click(function(){
            $("#modal-inputkaryawan").modal("show");
        });
        $(".edit").click(function(){
            var nik = $(this).attr('nik');
            $.ajax({
                type:'POST'
                ,url:'/karyawan/edit'
                ,cache: false
                ,data:{
                    _token:"{{ csrf_token(); }}"
                    ,nik: nik,

                },
                success: function(respond){
                    $("#loadeditform").html(respond);
                }

            });
            $("#modal-editkaryawan").modal("show");
        });

        $(".delete-confirm").click(function(e){
            var form = $(this).closest('form');
            e.preventDefault();
                Swal.fire({
                title: "Apakah Anda Yakin Mau Menghapus Data Ini ?",
                text: "Jika Yakin Maka Data Akan Terhapus Permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus Saja!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    Swal.fire({
                    title: "Di Hapus!",
                    text: "Data sudah terhapus.",
                    icon: "success"
                    });
                }
            });

        });

        $("#frmkaryawan").submit(function(){
            var nik = $("#nik").val();
            var nama_lengkap = $("#nama_lengkap").val();
            var jabatan = $("#jabatan").val();
            var no_hp = $("#no_hp").val();
            var kode_dept = $("frmkaryawan").find("#kode_dept").val();
            var kode_cabang = $("frmkaryawan").find("#kode_cabang").val();
            if(nik==""){
               // alert('Nik Harus Diisi');
               Swal.fire({
                title: 'NIK Harus Diisi!',
                text: 'Lengkapi data !',
                icon: 'warning',
                confirmButtonText: 'OK'
                }).then(()=> {
                    $("#nik").focus();
                });
                $("#nik").focus();
                return false;
            }else if(nama_lengkap == ""){
                Swal.fire({
                title: 'Nama Lengkap belum Diisi!',
                text: 'Lengkapi Data !',
                icon: 'warning',
                confirmButtonText: 'OK'
                }).then(()=> {
                    $("#nama_lengkap").focus();
                });
                $("#nama_lengkap").focus();
                return false;

            }else if(jabatan == ""){
                Swal.fire({
                title: 'Jabatan Belum Diisi!',
                text: 'Lengkapi Data!',
                icon: 'warning',
                confirmButtonText: 'OK'
                }).then(()=> {
                    $("#jabatan").focus();
                });
                $("#jabatan").focus();
                return false;

            }else if(no_hp == ""){
                Swal.fire({
                title: 'Nomor HP Belum Diisi!',
                text: 'Lengkapi Data!',
                icon: 'warning',
                confirmButtonText: 'OK'
                }).then(()=> {
                    $("#no_hp").focus();
                });
                $("#no_hp").focus();
                return false;

            }else if(kode_dept == ""){
                Swal.fire({
                title: 'Divisi Belum Diisi!',
                text: 'Lengkapi Data!',
                icon: 'warning',
                confirmButtonText: 'OK'
                }).then(()=> {
                    $("#kode_dept").focus();
                });
                $("#kode_dept").focus();
                return false;

            }else if(kode_cabang == ""){
                Swal.fire({
                title: 'Cabang Belum Diisi!',
                text: 'Lengkapi Data!',
                icon: 'warning',
                confirmButtonText: 'OK'
                }).then(()=> {
                    $("#kode_cabang").focus();
                });
                $("#kode_cabang").focus();
                return false;

            }
        });
    });
</script>
    
@endpush