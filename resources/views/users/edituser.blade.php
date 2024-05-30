<form action="/konfigurasi/users/{{ $user->id}}/update" method="POST" id="frmUser" >
    @csrf
    
    <div class="row mt-1">
        <div class="col-12">
            <div class="input-icon">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h3.5" /><path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z" /></svg>
                </span>
                <input type="text" id="nama_user" value="{{$user->name}}" class="form-control" name="nama_user" placeholder="Nama User">
              </div>
        </div>
    </div>

    <div class="row mt-1">
      <div class="col-12">
          <div class="input-icon ">
              <span class="input-icon-addon">
                <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-at"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M16 12v1.5a2.5 2.5 0 0 0 5 0v-1.5a9 9 0 1 0 -5.5 8.28" /></svg> </span>
              <input type="text" id="email" value="{{$user->email}}" class="form-control" name="email" placeholder="Email User">
            </div>
      </div>
  </div>
  <div class="row mt-1">
    <div class="col-12">
      <div class="form-group">
        <select name="kode_dept" id="kode_dept" class="form-select">
          <option value="">Departemen</option>
          @foreach ($departemen as $d)
          <option {{ $user->kode_dept == $d->kode_dept ? 'selected' : ''}} value="{{ $d->kode_dept}}">
            {{ $d->nama_dept}}</option>
              
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
          <option {{ $user->role_id == $d->id ? 'selected' : ''}} value="{{ $d->id}}">
            {{ $d->name}}</option>
              
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
          <option {{ $user->kode_cabang == $d->kode_cabang ? 'selected' : ''}}
            value="{{$d->kode_cabang}}">{{ strtoupper($d->nama_cabang)}}
          </option>
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
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
  </form>