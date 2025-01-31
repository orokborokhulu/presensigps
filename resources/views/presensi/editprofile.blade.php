@extends('layouts.presensi')
@section('header')
<style>
   .logout{
    position:absolute'
    color:white;
    font-size:16px;
    text-decoration: none;
    left:5px;
    color:white;
   } 
   .logout:hover{
    color:white;
   }
</style>
<!--start App header -->
<div class="appHeader bg-danger text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline" ></ion-icon>
        </a>
    </div>
    <div class="right">
        <a href="/proseslogout" class="logout">
            <ion-icon name="exit-outline"></ion-icon>
            Keluar
        </a>
    </div>
    <div class="pageTitle">Edit Profile</div>
    <div class="right"></div>
</div>
<!--end App header -->
@endsection

@section('content')
<div class="row" style="margin-top: 6rem">
     
    <div class="col">
    @php
        $messagesuccess = Session::get('success');
        $messageerror = Session::get('error');
    @endphp
    @if (Session::get('success'))
        <div class="alert alert-success" >
            {{$messagesuccess}}
        </div>
    @endif

    @error('foto')
    <div class="alert alert-warning">
        <p>
            {{$message}}
        </p>
    </div>
        
    @enderror

    @if (Session::get('error'))
    <div class="alert alert-danger" >
        {{$messageerror}}
    </div>
    @endif
    </div>
</div>
<form action="/presensi/{{$karyawan->nik}}/updateprofile" method="POST" enctype="multipart/form-data" >
    @csrf
    <div class="col">          
        <div class="form-group boxed">
            <div class="input-wrapper">
                <input type="text" class="form-control" value="{{$karyawan->nama_lengkap}}" name="nama_lengkap" placeholder="Nama Lengkap" autocomplete="off">
            </div>
        </div>
        <div class="form-group boxed">
            <div class="input-wrapper">
                <input type="text" class="form-control" value="{{$karyawan->no_hp}}" name="no_hp" placeholder="No. HP" autocomplete="off">
            </div>
        </div>
        <div class="form-group boxed">
            <div class="input-wrapper">
                <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
            </div>
        </div>
        <div class="custom-file-upload" id="fileUpload1">
            <input type="file" name="foto" id="fileuploadInput" accept=".png, .jpg, .jpeg">
            <label for="fileuploadInput">
                <span>
                    <strong>
                        <ion-icon name="cloud-upload-outline" role="img" class="md hydrated" aria-label="cloud upload outline"></ion-icon>
                        <i>Tap to Upload</i>
                    </strong>
                </span>
            </label>
        </div>
        <div class="form-group boxed">
            <div class="input-wrapper">
                <button type="submit" class="btn btn-primary btn-block">
                    <ion-icon name="refresh-outline"></ion-icon>
                    Update
                </button>
            </div>
        </div>

     


    </div>
</form>
@endsection