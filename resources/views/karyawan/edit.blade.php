<form action="/karyawan/{{$karyawan->nik}}/update" method="POST" id="frmEditkaryawan" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7v-1a2 2 0 0 1 2 -2h2" /><path d="M4 17v1a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v1" /><path d="M16 20h2a2 2 0 0 0 2 -2v-1" /><path d="M5 11h1v2h-1z" /><path d="M10 11l0 2" /><path d="M14 11h1v2h-1z" /><path d="M19 11l0 2" /></svg>
                </span>
                <input type="text" readonly value="{{$karyawan->nik}}" id="nik"  name="nik" class="form-control" placeholder="Nik">
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
                <input type="text" id="nama_lengkap" value="{{$karyawan->nama_lengkap}}" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap">
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
                <input type="text" id="jabatan" value="{{$karyawan->jabatan}}" class="form-control" name="jabatan" placeholder="Jabatan">
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
                <input type="text" id="no_hp" value="{{$karyawan->no_hp}}" class="form-control" name="no_hp" placeholder="Nomor HP">
              </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-12"> 
                <input type="file" name="foto" class="form-control">
                <input type="hidden" name="old_foto" value="{{$karyawan->foto}}">
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
            <select name="kode_dept" id="kode_dept" class="form-select">
                <option value="">Divisi</option>
                @foreach ($departemen as $d)
                <option {{$karyawan->kode_dept== $d->kode_dept ? 'selected' : '' }} value="{{$d->kode_dept}}">{{$d->nama_dept}}</option>   
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

  <script>
    $("#frmEditkaryawan").submit(function(){
            var nik = $("#frmEditkaryawan").find("#nik").val();
            var nama_lengkap = $("#frmEditkaryawan").find("#nama_lengkap").val();
            var jabatan = $("#frmEditkaryawan").find("#jabatan").val();
            var no_hp = $("#frmEditkaryawan").find("#no_hp").val();
            var kode_dept = $("#frmEditkaryawan").find("#kode_dept").val();
            var kode_cabang = $("#frmEditkaryawan").find("#kode_cabang").val();
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

  </script>