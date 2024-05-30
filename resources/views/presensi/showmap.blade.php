<style>
    #map { height: 320px; }
</style>

<div id="map"></div>
<script>
    var lokasi = "{{$presensi->lokasi_in}}";
    var lok = lokasi.split(",");
    var latitude = lok[0];
    var longitude = lok[1];
    var map = L.map('map').setView([latitude,longitude], 18);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 20,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);
var marker = L.marker([latitude,longitude]).addTo(map);
var circle = L.circle([-6.948935547701262, 107.60384239612527], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 15
}).addTo(map);
var popup = L.popup()
    .setLatLng([latitude,longitude])
    .setContent("{{$presensi->nama_lengkap}}")
    .openOn(map);
</script>