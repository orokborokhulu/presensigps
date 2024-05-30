<form action="/konfigurasi/updatejamkerja" method="POST" id="frmJK_edit" >
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7v-1a2 2 0 0 1 2 -2h2" /><path d="M4 17v1a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v1" /><path d="M16 20h2a2 2 0 0 0 2 -2v-1" /><path d="M5 11h1v2h-1z" /><path d="M10 11l0 2" /><path d="M14 11h1v2h-1z" /><path d="M19 11l0 2" /></svg>
                </span>
                <input type="text" id="kode_jam_kerja" name="kode_jam_kerja" value="{{$jamkerja ->kode_jam_kerja}}" class="form-control" name="kode_jam_kerja_edit" placeholder="Kode Jam Kerja">
              </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-article" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" /><path d="M7 8h10" /><path d="M7 12h10" /><path d="M7 16h10" /></svg>
                </span>
                <input type="text" id="nama_jam_kerja_edit" value="{{$jamkerja ->nama_jam_kerja}}" class="form-control" name="nama_jam_kerja" placeholder="Nama Jam Kerja">
              </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-record" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M21 12.3a9 9 0 1 0 -8.683 8.694" /><path d="M12 7v5l2 2" /><path d="M19 19m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /></svg>
                </span>
                <input type="text" id="awal_jam_masuk_edit" value="{{$jamkerja ->awal_jam_masuk}}" class="form-control" name="awal_jam_masuk" placeholder="Awal jam Masuk">
              </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-5 2.66a1 1 0 0 0 -.993 .883l-.007 .117v5l.009 .131a1 1 0 0 0 .197 .477l.087 .1l3 3l.094 .082a1 1 0 0 0 1.226 0l.094 -.083l.083 -.094a1 1 0 0 0 0 -1.226l-.083 -.094l-2.707 -2.708v-4.585l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor" /></svg>
                </span>
                <input type="text" id="jam_masuk_edit" value="{{$jamkerja ->jam_masuk}}" class="form-control" name="jam_masuk" placeholder="Jam Masuk">
              </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-cancel" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20.997 12.25a9 9 0 1 0 -8.718 8.745" /><path d="M19 19m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M17 21l4 -4" /><path d="M12 7v5l2 2" /></svg>
                </span>
                <input type="text" id="akhir_jam_masuk_edit" value="{{$jamkerja ->akhir_jam_masuk}}" class="form-control" name="akhir_jam_masuk" placeholder="Akhir Jam Masuk">
              </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alarm-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6.072a8 8 0 1 1 -11.995 7.213l-.005 -.285l.005 -.285a8 8 0 0 1 11.995 -6.643zm-4 2.928a1 1 0 0 0 -1 1v3l.007 .117a1 1 0 0 0 .993 .883h2l.117 -.007a1 1 0 0 0 .883 -.993l-.007 -.117a1 1 0 0 0 -.993 -.883h-1v-2l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor" /><path d="M6.412 3.191a1 1 0 0 1 1.273 1.539l-.097 .08l-2.75 2a1 1 0 0 1 -1.273 -1.54l.097 -.08l2.75 -2z" stroke-width="0" fill="currentColor" /><path d="M16.191 3.412a1 1 0 0 1 1.291 -.288l.106 .067l2.75 2a1 1 0 0 1 -1.07 1.685l-.106 -.067l-2.75 -2a1 1 0 0 1 -.22 -1.397z" stroke-width="0" fill="currentColor" /></svg>
                </span>
                <input type="text" id="jam_pulang_edit" value="{{$jamkerja ->jam_pulang}}" class="form-control" name="jam_pulang" placeholder="Jam Pulang">
              </div>
        </div>
    </div>
    <div class="row">
      <div class="col-12">
          <div class="form-group">
              <select name="lintashari" id="lintashari" class="form-select">
                  <option value="">Lintas Hari</option>
                  <option value="1" {{$jamkerja->lintashari == 1 ? 'selected' : ''}}>Ya</option>
                  <option value="0" {{$jamkerja->lintashari == 0 ? 'selected' : ''}}>Tidak</option>
              </select>
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

<script>
   $("#awal_jam_masuk_edit, #jam_masuk_edit, #akhir_jam_masuk_edit, #jam_pulang_edit ").mask("00:00");
   $("#frmJK_edit").submit(function(){
            
            var kode_jam_kerja = $("#kode_jam_kerja_edit").val();
            var nama_jam_kerja = $("#nama_jam_kerja_edit").val();
            var awal_jam_masuk = $("#awal_jam_masuk_edit").val();
            var jam_masuk = $("#jam_masuk_edit").val();
            var akhir_jam_masuk = $("#akhir_jam_masuk_edit").val();
            var jam_pulang = $("#jam_pulang_edit").val();
            var lintashari = $("#lintashari_edit").val();
            if(kode_jam_kerja==""){
               // alert('kode dept Harus Diisi');
               Swal.fire({
                title: 'kode jam Kerja Harus Diisi!',
                text: 'Lengkapi data !',
                icon: 'warning',
                confirmButtonText: 'OK'
                }).then(()=> {
                    $("#kode_jam_kerja").focus();
                });
                $("#kode_jam_kerja").focus();
                return false;
            }else if(nama_jam_kerja == ""){
                Swal.fire({
                title: 'Nama Jam Kerja belum Diisi!',
                text: 'Lengkapi Data !',
                icon: 'warning',
                confirmButtonText: 'OK'
                }).then(()=> {
                    $("#nama_jam_kerja").focus();
                });
                $("#nama_jam_kerja").focus();
                return false;

            }else if(awal_jam_masuk == ""){
                Swal.fire({
                title: 'Awal jam Masuk Belum Diisi!',
                text: 'Lengkapi Data!',
                icon: 'warning',
                confirmButtonText: 'OK'
                }).then(()=> {
                    $("#awal_jam_masuk").focus();
                });
                $("#awal_jam_masuk").focus();
                return false;

            }else if(jam_masuk == ""){
                Swal.fire({
                title: 'Jam Masuk Belum Diisi!',
                text: 'Lengkapi Data!',
                icon: 'warning',
                confirmButtonText: 'OK'
                }).then(()=> {
                    $("#jam_masuk").focus();
                });
                $("#jam_masuk").focus();
                return false;

            }else if(akhir_jam_masuk == ""){
                Swal.fire({
                title: 'Akhir Jam Masuk Belum Diisi!',
                text: 'Lengkapi Data!',
                icon: 'warning',
                confirmButtonText: 'OK'
                }).then(()=> {
                    $("#akhir_jam_masuk").focus();
                });
                $("#akhir_jam_masuk").focus();
                return false;

            }else if(jam_pulang == ""){
                Swal.fire({
                title: 'Jam Pulang Belum Diisi!',
                text: 'Lengkapi Data!',
                icon: 'warning',
                confirmButtonText: 'OK'
                }).then(()=> {
                    $("#jam_pulang").focus();
                });
                $("#jam_pulang").focus();
                return false;

            }else if(lintashari == ""){
                Swal.fire({
                title: 'Warning!',
                text: 'Lintas Hari Harus diisi!',
                icon: 'warning',
                confirmButtonText: 'OK'
                }).then(()=> {
                    $("#lintashari").focus();
                });
                $("#lintashari").focus();
                return false;

            }
        });
</script>
    
