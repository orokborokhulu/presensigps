
@extends('layouts.presensi')
@section('header')
     <!-- App Header -->
     <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="javascript:;" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">E - Presensi</div>
        <div class="right"></div>
    </div>
    <!-- * App Header -->
<style>
    .webcam-capture,
    .webcam-capture video{
        display: inline-block;
        width: 100% !important;
        margin: auto;
        height: auto !important;
        border-radius: 15px;
    }
    #map { 
        height: 280px; 
        }


        .jam-digital-malasngoding {
 
 background-color: #5b5b5b83;
 position: absolute;
 top: 65px;
 right: 10px;
 z-index: 9999;
 width: 140px;
 border-radius: 10px;
 padding: 5px;
}



.jam-digital-malasngoding p {
 color: #fff;
 font-size: 14px;
 text-align: left;
 margin-top: 0;
 margin-bottom: 0;
}

</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
@endsection

@section('content')
<div class="row" style="margin-top: 60px">
   <div class="col">
        <div class="alert alert-warning">
            <p>
                Maaf, Anda tidak memiliki jadwal pada hari ini!, Silahkan Hubungi HRD
            </p>
        </div>
        
   </div>
</div>
@endsection

