@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          
          <h2 class="page-title">
            Set Jam kerja 
          </h2>
        </div> 
      </div>
    </div>
  </div>
  <div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <tr>
                        <th>NIK</th>
                        <td>{{$karyawan->nik}}</td>
                    </tr>
                    <tr>
                        <th>Nama Karyawan</th>
                        <td>{{$karyawan->nama_lengkap}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs nav-fill" data-bs-toggle="tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a href="#setjamkerjaharian" class="nav-link active" data-bs-toggle="tab" aria-selected="true" role="tab"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-clock-24"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 0 0 5.998 8.485m12.002 -8.485a9 9 0 1 0 -18 0" /><path d="M12 7v5" /><path d="M12 15h2a1 1 0 0 1 1 1v1a1 1 0 0 1 -1 1h-1a1 1 0 0 0 -1 1v1a1 1 0 0 0 1 1h2" /><path d="M18 15v2a1 1 0 0 0 1 1h1" /><path d="M21 15v6" /></svg>  
                                    Set Jam kerja Harian
                                </a>
                              </li>
                              <li class="nav-item" role="presentation">
                                <a href="#setjamkerjabydate" class="nav-link" data-bs-toggle="tab" aria-selected="false" tabindex="-1" role="tab"><!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-month"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M7 14h.013" /><path d="M10.01 14h.005" /><path d="M13.01 14h.005" /><path d="M16.015 14h.005" /><path d="M13.015 17h.005" /><path d="M7.01 17h.005" /><path d="M10.01 17h.005" /></svg>  
                                    Set Jam Kerja By Date
                                </a>
                              </li>
                          </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                          <div class="tab-pane active show" id="setjamkerjaharian" role="tabpanel">
                            <form action="/konfigurasi/storesetjamkerja" method="POST">
                                @csrf
                                <input type="hidden" name="nik" value="{{$karyawan->nik}}">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Hari</th>
                                            <th>Jam kerja</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Senin
                                                <input type="hidden" name="hari[]" value="Senin">
                                            </td>
                                            <td>
                                                <select name="kode_jam_kerja[]" id="kode_jam_kerja" class="form-select">
                                                    <option value="">Pilih Jam Kerja</option>
                                                    @foreach($jamkerja as $d)
                                                    <option value="{{$d->kode_jam_kerja}}">{{$d->nama_jam_kerja}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Selasa</td>
                                            <input type="hidden" name="hari[]" value="Selasa">
                                            <td>
                                                <select name="kode_jam_kerja[]" id="kode_jam_kerja" class="form-select">
                                                    <option value="">Pilih Jam Kerja</option>
                                                    @foreach($jamkerja as $d)
                                                    <option value="{{$d->kode_jam_kerja}}">{{$d->nama_jam_kerja}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Rabu</td>
                                            <input type="hidden" name="hari[]" value="Rabu">
                                            <td>
                                                <select name="kode_jam_kerja[]" id="kode_jam_kerja" class="form-select">
                                                    <option value="">Pilih Jam Kerja</option>
                                                    @foreach($jamkerja as $d)
                                                    <option value="{{$d->kode_jam_kerja}}">{{$d->nama_jam_kerja}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kamis</td>
                                            <input type="hidden" name="hari[]" value="Kamis">
                                            <td>
                                                <select name="kode_jam_kerja[]" id="kode_jam_kerja" class="form-select">
                                                    <option value="">Pilih Jam Kerja</option>
                                                    @foreach($jamkerja as $d)
                                                    <option value="{{$d->kode_jam_kerja}}">{{$d->nama_jam_kerja}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jumat</td>
                                            <input type="hidden" name="hari[]" value="Jumat">
                                            <td>
                                                <select name="kode_jam_kerja[]" id="kode_jam_kerja" class="form-select">
                                                    <option value="">Pilih Jam Kerja</option>
                                                    @foreach($jamkerja as $d)
                                                    <option value="{{$d->kode_jam_kerja}}">{{$d->nama_jam_kerja}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sabtu</td>
                                            <input type="hidden" name="hari[]" value="Sabtu">
                                            <td>
                                                <select name="kode_jam_kerja[]" id="kode_jam_kerja" class="form-select">
                                                    <option value="">Pilih Jam Kerja</option>
                                                    @foreach($jamkerja as $d)
                                                    <option value="{{$d->kode_jam_kerja}}">{{$d->nama_jam_kerja}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Minggu</td>
                                            <input type="hidden" name="hari[]" value="Minggu">
                                            <td>
                                                <select name="kode_jam_kerja[]" id="kode_jam_kerja" class="form-select">
                                                    <option value="">Pilih Jam Kerja</option>
                                                    @foreach($jamkerja as $d)
                                                    <option value="{{$d->kode_jam_kerja}}">{{$d->nama_jam_kerja}}</option>
                                                    @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>  
                                    </table>
                                    <button class="btn btn-primary w-100" type="submit">Simpan</button>
                                </form>
                            </div>

                             <div class="tab-pane" id="setjamkerjabydate" role="tabpanel">
                            @include('konfigurasi.setjamkerjabydate')
                            </div>  
                        </div>
                    </div>
                </div>
   
            </div>
            <div class="col-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="6">Master Jam Kerja</th>
                        </tr>
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Awal Masuk</th>
                            <th>Jam Masuk</th>
                            <th>Akhir Jam Masuk</th>
                            <th>Jam Pulang</th>
                        </tr>
                    </thead>   
                    <tbody>
                        @foreach ($jamkerja as $d )
                        <tr>
                            <td>{{$d->kode_jam_kerja}}</td>
                            <td>{{$d->nama_jam_kerja}}</td>
                            <td>{{$d->awal_jam_masuk}}</td>
                            <td>{{$d->jam_masuk}}</td>
                            <td>{{$d->akhir_jam_masuk}}</td>
                            <td>{{$d->jam_pulang}}</td>
                        </tr>       
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('myscript')
<script>
    $(function(){

        $("#tanggal").datepicker({ 
            autoclose: true, 
            todayHighlight: true,
            format: 'yyyy-mm-dd'
        });   
        $("#tambahjamkerja").click(function(e){
           
            var nik = "{{$karyawan->nik}}";
            var tanggal = $("#tanggal").val();
            var kode_jam_kerja = $("#setjamkerjabydate").find("#kode_jam_kerja").val();

            if(tanggal == ""){
                Swal.fire({
                title: 'Warning!',
                text: 'Tanggal harus diisi!',
                icon: 'warning',
                confirmButtonText: 'OK'
                }).then((result)=> {
                    $("#tanggal").focus();
                });
            }else if(kode_jam_kerja == ""){
                Swal.fire({
                title: 'Warning!',
                text: 'Jam kerja harus diisi!',
                icon: 'warning',
                confirmButtonText: 'OK'
                }).then((result)=> {
                    $("#setjamkerjabydate").find("#kode_jam_kerja").focus();
                });
            }else{
                $.ajax({
                type: 'POST',
                url: '/konfigurasi/storesetjamkerjabydate',
                data:{
                    _token:"{{ csrf_token() }}",
                    nik: nik,
                    tanggal: tanggal,
                    kode_jam_kerja: kode_jam_kerja
                },
                cache:false,
                success:function(respond){
                    if(respond ==0){
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'data berhasil disimpan!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result)=> {
                            loadjamkerjabydate();
                        });
                    }else{
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'data gagal disimpan!',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    }).then((result)=> {
                        loadjamkerjabydate();
                    });
                }

                }
            });

            }
            
           
        });

        function loadjamkerjabydate(){
            var nik = "{{ $karyawan->nik }}";
            var bulan = $("#bulan").val();
            var tahun = $("#tahun").val();
            $("#loadjamkerjabydate").load('/konfigurasi/'+ nik +'/'+ bulan +'/'+ tahun +'/getjamkerjabydate');
        }

        $("#bulan, #tahun").change(function(e){
            loadjamkerjabydate();
        });
        loadjamkerjabydate();
    });
</script>
@endpush
