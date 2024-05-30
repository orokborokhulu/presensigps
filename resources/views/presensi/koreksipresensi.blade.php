<form action="/storekoreksipresensi" method="POST" id="formkoreksipresensi">
    @csrf
    <input type="hidden" name="nik" value="{{ $karyawan->nik}}">
    <input type="hidden" name="tanggal" value="{{ $tanggal }}">
   
    <table class="table">
        <tr>
            <td>Nik</td>
            <td>{{ $karyawan->nik }}</td>
        </tr>
        <tr>
            <td> Nama </td>
            <td>{{ $karyawan->nama_lengkap}}</td>
        </tr>
        <tr>
            <td> Tanggal </td>
            <td>{{ date('d-M-Y',strtotime($tanggal) )}}</td>
        </tr>
    </table>
    
    <div class="row mb-2">
        <div class="col-12">
            <div class="form-group">
                <select name="status" id="status" class="form-select">
                    <option value="">Pilih Status Kehadiran</option>
                    <option 
                    @if ($presensi != NULL) 
                        @if($presensi->status === 'h')
                        selected
                        @endif
                    @endif
                    value="h">Hadir</option>
                    <option 
                    @if ($presensi != NULL) 
                        @if($presensi->status === 'a')
                        selected
                        @endif
                    @endif
                    value="a">Alfa</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row mb-2" id="frm_jam_in">
        <div class="col-12">
            <div class="input-icon mb-2">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-clock-down"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20.984 12.535a9 9 0 1 0 -8.431 8.448" /><path d="M12 7v5l3 3" /><path d="M19 16v6" /><path d="M22 19l-3 3l-3 -3" /></svg>
                   </span>
                <input type="text"  id="jam_in" value="{{ $presensi != null ? $presensi->jam_in : ''}}"  name="jam_in" class="form-control" placeholder="Jam Masuk">
              </div>
        </div>
    </div>

    <div class="row mb-2" id="frm_jam_out">
        <div class="col-12">
            <div class="input-icon mb-2">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-clock-up"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20.983 12.548a9 9 0 1 0 -8.45 8.436" /><path d="M19 22v-6" /><path d="M22 19l-3 -3l-3 3" /><path d="M12 7v5l2.5 2.5" /></svg>    
                </span>
                <input type="text"  id="jam_out" value="{{ $presensi != null ? $presensi->jam_out : ''}}" name="jam_out" class="form-control" placeholder="Jam Pulang">
              </div>
        </div>
    </div>
    
    <div class="row mb-2" id="frm_kode_jam_kerja">
        <div class="col-12">
            <div class="form-group">
                <select name="kode_jam_kerja" id="kode_jam_kerja" class="form-select">
                    <option value="">Pilih Jam Kerja</option>
                    $@foreach ($jamkerja as $d)
                    <option
                    @if ($presensi != NULL) 
                        @if($presensi->kode_jam_kerja === $d->kode_jam_kerja)
                        selected
                        @endif
                    @endif
                    
                    value="{{ $d->kode_jam_kerja}}">{{ $d->nama_jam_kerja}}</option> 
                    @endforeach
                </select>
            </div>
        </div>
    </div>

   

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <button class="btn btn-primary w-100">Submit</button>
            </div>
        </div>
    </div>
    
</form>

<script>
    $(function(){

        function loadkoreksi(){
            var status = $("#status").val();
            if(status == "a"){
                $("#frm_jam_in").hide();
                $("#frm_jam_out").hide();
                $("#frm_kode_jam_kerja").hide();
            }else{
                $("#frm_jam_in").show();
                $("#frm_jam_out").show();
                $("#frm_kode_jam_kerja").show();
            }
        }
        loadkoreksi();

        $("#status").change(function(e){
            loadkoreksi();
        });
        $("#formkoreksipresensi").submit(function(){
            
            var kode_jam_kerja = $("#kode_jam_kerja").val();
            var status = $("#status").val();

            if(status == ""){
                Swal.fire({
                title: 'Warning!',
                text: 'Status kehadiran Harus Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
                }).then((result)=> {
                    $("#status").focus();
                });
               
                return false;
            }else if(kode_jam_kerja == "" && status == "h"){
                Swal.fire({
                title: 'Warning!',
                text: 'Kode Jam Kerja Diisi !',
                icon: 'warning',
                confirmButtonText: 'OK'
                }).then((result)=> {
                    $("#kode_jam_kerja").focus();
                });
                return false;
            }
        });
    });
</script>