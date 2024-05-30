<div class="row mb-3">
    <div class="col-8">
        <div class="form-group">
            <select name="bulan" id="bulan" class="form-select">
                <option value="">Pilih Bulan</option>
                @for ($b = 1; $b <= 12; $b++)
                    <option {{ $b == date('m') ? 'selected' : '' }} value="{{ $b }}">{{ $bulan[$b - 1] }}</option>
                @endfor
            </select>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <select name="tahun" id="tahun" class="form-select">
                <option value="">Pilih Tahun</option>
                @php
                    $tahun_mulai = 2023;
                    $tahun_akhir = date('Y');
                 @endphp
                 @for ($t = $tahun_mulai; $t <= $tahun_akhir; $t++)
                    <option {{ $t == date('Y') ? 'selected' : ''}} 
                        value="{{ $t }}">{{ $t }} 
                    </option>                                    
                 @endfor
            </select>
        </div>
    </div>
    </div>
    <hr>
    <div class="row">
    <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                          <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                          <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-clock"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.5 21h-4.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v3" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h10" /><path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M18 16.5v1.5l.5 .5" /></svg>  </span>
                        <input type="text"   id="tanggal"  name="tanggal" class="form-control" placeholder="Tanggal" autocomplete="off">
                      </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <select name="kode_jam_kerja" id="kode_jam_kerja" class="form-select">
                            <option value="">Pilih Jam Kerja</option>
                            @foreach($jamkerja as $d)
                                <option value="{{$d->kode_jam_kerja}}">{{$d->nama_jam_kerja}}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <button id="tambahjamkerja" class="btn btn-primary">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12.5 21h-6.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v5" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M16 19h6" /><path d="M19 16v6" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered">
            <thead>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Jam Kerja</th>
                <th>#</th>
            </thead>
            <tbody id="loadjamkerjabydate"></tbody>
        </table>
    </div>
</div>
