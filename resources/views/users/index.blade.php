@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          
          <h2 class="page-title">
            Data Users
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

                        
                        <div class="row">
                            <div class="col-12">
                                <a href="#" class="btn btn-primary" id="btnTambahuser"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                    Tambah Data
                                </a>
                            </div>
                        </div>
                       
                        <div class="row mt-2">
                            <div class="col-12">
                            <form action="{{ URL::current() }}" method="GET">
                                <div class="row">
                                    <div class="col-10">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control" placeholder=" Nama Users" value="{{ request('name')}}">
                                        </div>
                                    </div>
                                    
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
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Divisi</th>
                                            <th>Role</th>
                                            <th>Cabang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $d)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{ $d->name}}</td>
                                            <td>{{ $d->email}}</td>
                                            <td>{{ $d->nama_dept}}</td>
                                            <td>{{ ucwords($d->role)}}</td>
                                            <td>{{ $d->kode_cabang}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="#" class="edit btn btn-info btn-sm " id_user="{{$d->id}}" >
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                                    </a>
                                                <form action="/konfigurasi/users/{{$d->id}}/delete" method="POST" style="margin-left: 5px">
                                                        @csrf
                                                        <a class="btn btn-danger btn-sm delete-confirm">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eraser" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19 20h-10.5l-4.21 -4.3a1 1 0 0 1 0 -1.41l10 -10a1 1 0 0 1 1.41 0l5 5a1 1 0 0 1 0 1.41l-9.2 9.3" /><path d="M18 13.3l-6.3 -6.3" /></svg>
                                                        </a>
                                                </form>
                                                </div>
                                            </td>
                                        </tr>
                                            
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$users->links('vendor.pagination.bootstrap-5')}}
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </div>   
  </div>
{{--modal add users--}}
  <div class="modal modal-blur fade" id="modal-inputuser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data Users</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/konfigurasi/users/store" method="POST" id="frmUser" >
            @csrf
            
            <div class="row mt-1">
                <div class="col-12">
                    <div class="input-icon">
                        <span class="input-icon-addon">
                          <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h3.5" /><path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z" /></svg>
                        </span>
                        <input type="text" id="nama_user" value="" class="form-control" name="nama_user" placeholder="Nama User">
                      </div>
                </div>
            </div>

            <div class="row mt-1">
              <div class="col-12">
                  <div class="input-icon ">
                      <span class="input-icon-addon">
                        <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-at"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M16 12v1.5a2.5 2.5 0 0 0 5 0v-1.5a9 9 0 1 0 -5.5 8.28" /></svg> </span>
                      <input type="text" id="email" value="" class="form-control" name="email" placeholder="Email User">
                    </div>
              </div>
          </div>
          <div class="row mt-1">
            <div class="col-12">
              <div class="form-group">
                <select name="kode_dept" id="kode_dept" class="form-select">
                  <option value="">Departemen</option>
                  @foreach ($departemen as $d)
                  <option value="{{$d->kode_dept}}">{{$d->nama_dept}}</option>
                      
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="row mt-1">
            <div class="col-12">
              <div class="form-group">
                <select name="role" id="role" class="form-select">
                  <option value="">Role</option>
                  @foreach ($role as $d)
                  <option value="{{$d->name}}">{{ucwords($d->name)}}</option>
                      
                  @endforeach
                </select>

              </div>
            </div>
          </div>

          <div class="row mt-1">
            <div class="col-12">
              <div class="form-group">
                <select name="kode_cabang" id="kode_cabang" class="form-select">
                  <option value="">Cabang</option>
                  @foreach ($cabang as $d)
                  <option value="{{$d->kode_cabang}}">{{ strtoupper($d->nama_cabang)}}</option>
                      
                  @endforeach
                </select>

              </div>
            </div>
          </div>

            <div class="row mt-1">
              <div class="col-12">
                <div class="input-icon ">
                  <span class="input-icon-addon">
                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-key"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.555 3.843l3.602 3.602a2.877 2.877 0 0 1 0 4.069l-2.643 2.643a2.877 2.877 0 0 1 -4.069 0l-.301 -.301l-6.558 6.558a2 2 0 0 1 -1.239 .578l-.175 .008h-1.172a1 1 0 0 1 -.993 -.883l-.007 -.117v-1.172a2 2 0 0 1 .467 -1.284l.119 -.13l.414 -.414h2v-2h2v-2l2.144 -2.144l-.301 -.301a2.877 2.877 0 0 1 0 -4.069l2.643 -2.643a2.877 2.877 0 0 1 4.069 0z" /><path d="M15 9h.01" /></svg>
                  </span>
                    <input type="password" id="password"  class="form-control" name="password" placeholder="Admin Password">
                </div>
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

{{--modal edit users--}}
<div class="modal modal-blur fade" id="modal-edituser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Data User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="loadedituser">
          
        </div>
        
      </div>
    </div>
  </div>

  

@endsection

@push('myscript')
<script>
  $(function(){
        $("#btnTambahuser").click(function(){
            $("#modal-inputuser").modal("show");
        });

        $(".edit").click(function(){
            var id_user = $(this).attr('id_user');
            $.ajax({
                type:'POST'
                ,url:'/konfigurasi/users/edit'
                ,cache: false
                ,data:{
                    _token:"{{ csrf_token(); }}"
                    ,id_user: id_user

                },
                success: function(respond){
                    $("#loadedituser").html(respond);
                }

            });
            $("#modal-edituser").modal("show");
        });

        $("#frmUser").submit(function(){
          var nama_user = $("#nama_user").val();
          var email = $("#email").val();
          var kode_dept = $("#kode_dept").val();
          var role = $("#role").val();
          var kode_cabang = $("#kode_cabang").val();

          if(nama_user == ""){
            Swal.fire({
              title:'warning',
              text:'Nama harus diisi',
              icon:'warning',
              confirmButtonText:'OK'
            }).then((result)=>{
              $("#nama_user").focus();
            });
            return false;

           }else if(email == ""){
            Swal.fire({
              title:'warning',
              text:'Email harus diisi',
              icon:'warning',
              confirmButtonText:'OK'
            }).then((result)=>{
              $("#email").focus();
            });
            return false;
          }else if(kode_dept == ""){
            Swal.fire({
              title:'warning',
              text:'Nama Divisi harus diisi',
              icon:'warning',
              confirmButtonText:'OK'
            }).then((result)=>{
              $("#kode_dept").focus();
            });
            return false;
          }else if(role == ""){
            Swal.fire({
              title:'warning',
              text:'Role harus diisi',
              icon:'warning',
              confirmButtonText:'OK'
            }).then((result)=>{
              $("#role").focus();
            });
            return false;
          }else if(kode_cabang == ""){
            Swal.fire({
              title:'warning',
              text:'Cabang harus diisi',
              icon:'warning',
              confirmButtonText:'OK'
            }).then((result)=>{
              $("#kode_cabang").focus();
            });
            return false;
          }
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

      });
</script>
    
@endpush
