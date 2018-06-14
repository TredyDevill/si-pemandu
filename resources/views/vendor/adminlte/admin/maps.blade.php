@extends('vendor.adminlte.layouts.appadmin')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAtFnKBeTAorl8rWoo066pk7pwimSpA-w"></script>
<div id="map"></div>
<div class="w3-bar" style="position: relative;">
  <div class="w3-right w3-padding-16" style="margin-right:0.5em;letter-spacing:1px">
    <div class="w3-bar-item w3-large">
      <button class="w3-btn float-btn w3-circle w3-green w3-text-white" id="all" onclick="hapus()"><i class="fa fa-refresh w3-hover-opacity"></i></button>
      <button onclick="dropdown()" class="w3-btn float-btn w3-circle w3-blue-gray w3-text-white"><i class="fa fa-bars w3-hover-opacity"></i></button>
    </div>
  </div>
</div>

<div id="dropdown1" class="responsive scrollbar style-7 w3-dropdown-content w3-bar-block w3-card-4 w3-animate-zoom"  style="position: relative;">
  <div class="w3-bar">
    <a id="myBtn" onclick="myFunc('Demo1')" href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom" style="padding: 12px 1.5em; text-decoration: none;"><i class="fa fa-heartbeat w3-medium" style="margin-right: 7px;"></i> Bayi </a>
      <div id="Demo1" class="w3-hide w3-animate-left w3-text-gray" style="padding: 5px 2em 1em; border-bottom: 1px solid #ccc;">
        <input type="checkbox" class="checkbox" id="gb" onclick="buruk()"> Gizi Buruk <br>
        <input type="checkbox" class="checkbox" id="gk" onclick="kurang()"> Gizi Kurang <br>
        <input type="checkbox" class="checkbox" id="gbaik" onclick="baik()"> Gizi Baik <br>
        <input type="checkbox" class="checkbox" id="gl" onclick="lebih()"> Gizi Lebih <br>
      </div>
    <a id="myBtn" onclick="myFunc('Demo2')" href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom" style="padding: 12px 1.5em; text-decoration: none;"><i class="fa fa-heartbeat w3-medium" style="margin-right: 7px;"></i> Balita </a>
      <div id="Demo2" class="w3-hide w3-animate-left w3-text-gray" style="padding: 5px 2em 1em; border-bottom: 1px solid #ccc;">
        <input type="checkbox" class="checkbox" id="gbb" onclick="gizib()"> Gizi Buruk <br>
        <input type="checkbox" class="checkbox" id="gkb" onclick="gizik()"> Gizi Kurang <br>
        <input type="checkbox" class="checkbox" id="gbaikb" onclick="gizibaik()"> Gizi Baik <br>
        <input type="checkbox" class="checkbox" id="glb" onclick="gizil()"> Gizi Lebih <br>
      </div>
  </div>
</div>

<script>
var map;

var kms = <?php print_r(json_encode($kmz)) ?>;
var kmsgk = <?php print_r(json_encode($kmsk)) ?>;
var kmsik = <?php print_r(json_encode($kmsbaik)) ?>;
var kmsih = <?php print_r(json_encode($kmslebih)) ?>;
var balitaburuk = <?php print_r(json_encode($kmsbalburuk)) ?>;
var balitakurang = <?php print_r(json_encode($kmsbalkurang)) ?>;
var balitabaik = <?php print_r(json_encode($kmsbalbaik)) ?>;
var balitalebih = <?php print_r(json_encode($kmsballebih)) ?>;

var markers =[];
var markers2 =[];
var markers3 =[];
var markers4 =[];
var markers5 =[];
var markers6 =[];
var markers7 =[];
var markers8 =[];

var layer_7;

      function initMap() {
        // Create a map object and specify the DOM element for display.
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -6.3973829, lng: 106.8126366},
          zoom: 13
        });
        var style = [
        {
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#ebe3cd"
            }
          ]
        },
        {
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#523735"
            }
          ]
        },
        {
          "elementType": "labels.text.stroke",
          "stylers": [
            {
              "color": "#f5f1e6"
            }
          ]
        },
        {
          "featureType": "administrative",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#c9b2a6"
            }
          ]
        },
        {
          "featureType": "administrative.country",
          "stylers": [
            {
              "visibility": "on"
            }
          ]
        },
        {
          "featureType": "administrative.land_parcel",
          "stylers": [
            {
              "visibility": "on"
            }
          ]
        },
        {
          "featureType": "administrative.land_parcel",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#dcd2be"
            }
          ]
        },
        {
          "featureType": "administrative.land_parcel",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#ae9e90"
            }
          ]
        },
        {
          "featureType": "administrative.locality",
          "stylers": [
            {
              "visibility": "on"
            }
          ]
        },
        {
          "featureType": "administrative.neighborhood",
          "stylers": [
            {
              "visibility": "on"
            }
          ]
        },
        {
          "featureType": "administrative.province",
          "stylers": [
            {
              "visibility": "on"
            }
          ]
        },
        {
          "featureType": "administrative.province",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#ff0000"
            },
            {
              "visibility": "on"
            }
          ]
        },
        {
          "featureType": "landscape.natural",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#dfd2ae"
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#dfd2ae"
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#93817c"
            }
          ]
        },
        {
          "featureType": "poi.attraction",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi.business",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi.government",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi.medical",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi.park",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi.park",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#a5b076"
            }
          ]
        },
        {
          "featureType": "poi.park",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#447530"
            }
          ]
        },
        {
          "featureType": "poi.place_of_worship",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi.school",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi.sports_complex",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "road",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#f5f1e6"
            }
          ]
        },
        {
          "featureType": "road.arterial",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#fdfcf8"
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#f8c967"
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#e9bc62"
            }
          ]
        },
        {
          "featureType": "road.highway.controlled_access",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#e98d58"
            }
          ]
        },
        {
          "featureType": "road.highway.controlled_access",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#db8555"
            }
          ]
        },
        {
          "featureType": "road.local",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#806b63"
            }
          ]
        },
        {
          "featureType": "transit.line",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#dfd2ae"
            }
          ]
        },
        {
          "featureType": "transit.line",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#8f7d77"
            }
          ]
        },
        {
          "featureType": "transit.line",
          "elementType": "labels.text.stroke",
          "stylers": [
            {
              "color": "#ebe3cd"
            }
          ]
        },
        {
          "featureType": "transit.station",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#dfd2ae"
            }
          ]
        },
        {
          "featureType": "transit.station.airport",
          "stylers": [
            {
              "visibility": "on"
            }
          ]
        },
        {
          "featureType": "transit.station.bus",
          "stylers": [
            {
              "visibility": "on"
            }
          ]
        },
        {
          "featureType": "transit.station.rail",
          "stylers": [
            {
              "visibility": "on"
            }
          ]
        },
        {
          "featureType": "water",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#b9d3c2"
            }
          ]
        },
        {
          "featureType": "water",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#92998d"
            }
          ]
        }
      ];
      var styledMapType = new google.maps.StyledMapType(style, {
        map: map,
        name: 'Styled Map'
      });
      map.mapTypes.set('map-style', styledMapType);
      map.setMapTypeId('map-style');
      layer_7 = new google.maps.FusionTablesLayer({
        query: {
          select: "col0",
          from: "1kKFhr-EJ8uWfHlnV3o6Iqzdu-NGosuZr30Phs3HW"
        },
        // map: map,
        styleId: 2,
        templateId: 2
      });
      layer_7.setMap(map); 
      }
      google.maps.event.addDomListener(window, 'load', initMap);

function buruk(){
  var gizi = document.getElementById("gb");
  for(var i = 0; i < kms.length; i++){
    markers[i] = addMarker(kms[i]);
  }
  // console.log(markers[0]);
  function addMarker(kms){
    if(gizi.checked){
      var nama = kms.nama_anak;
      var ayah = kms.nama_ayah;
      var ibu = kms.nama_ibu;
      var lahir = kms.ttl;
      var umur = kms.umur;
      var lurah = kms.kelurahan;
      var rt = kms.rt;
      var rw = kms.rw;
      var berat = kms.bb;
      var timbang = kms.bln_penimbangan;
      var tinggi = kms.tinggi;
      var jenis = kms.jenis_kelamin;
      var kesimpulan = kms.kesimpulan_kms;
      var koordinat = kms.kordinat;
      var latitude = parseFloat(koordinat.split(',')[0]);
      var longitude = parseFloat(koordinat.split(',')[1]);

      var konten = '<div>' +
                   '<p> Nama Anak : ' + nama +
                   '<br> Nama Ayah : ' + ayah +
                   '<br> Nama Ibu : ' + ibu +
                   '<br> Tanggal Lahir : ' + lahir +
                   '<br> Umur : ' + umur +
                   '<br> Kelurahan : ' + lurah +
                   '<br> RT/RW : ' + rt + '/' + rw +
                   '<br> Berat Badan : ' + berat +
                   '<br> Bulan Penimbangan : ' + timbang +
                   '<br> Tinggi Badan : ' + tinggi +
                   '<br> Jenis Kelamin : ' + jenis +
                   '<br> Kesimpulan : <b>' +  kesimpulan  + '</b></p>' +
                   '</div>';
      var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/indomaret.png') }}"
              });
      var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });
      google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
        });
      return mark;
    }
    else{
        markers[i].setMap(null);
    }
  }
}

function kurang(){
  var btn2 = document.getElementById("gk");
  for(var i = 0; i < kmsgk.length; i++){
    markers2[i] = addMarker(kmsgk[i]);
  }
  // console.log(markers[0]);
  function addMarker(kmsgk){
    if(btn2.checked){
      var nama = kmsgk.nama_anak;
      var ayah = kmsgk.nama_ayah;
      var ibu = kmsgk.nama_ibu;
      var lahir = kmsgk.ttl;
      var umur = kmsgk.umur;
      var lurah = kmsgk.kelurahan;
      var rt = kmsgk.rt;
      var rw = kmsgk.rw;
      var berat = kmsgk.bb;
      var timbang = kmsgk.bln_penimbangan;
      var tinggi = kmsgk.tinggi;
      var jenis = kmsgk.jenis_kelamin;
      var kesimpulan = kmsgk.kesimpulan_kms;
      var koordinat = kmsgk.kordinat;
      var latitude = parseFloat(koordinat.split(',')[0]);
      var longitude = parseFloat(koordinat.split(',')[1]);

      var konten = '<div>' +
                   '<p> Nama Anak : ' + nama +
                   '<br> Nama Ayah : ' + ayah +
                   '<br> Nama Ibu : ' + ibu +
                   '<br> Tanggal Lahir : ' + lahir +
                   '<br> Umur : ' + umur +
                   '<br> Kelurahan : ' + lurah +
                   '<br> RT/RW : ' + rt + '/' + rw +
                   '<br> Berat Badan : ' + berat +
                   '<br> Bulan Penimbangan : ' + timbang +
                   '<br> Tinggi Badan : ' + tinggi +
                   '<br> Jenis Kelamin : ' + jenis +
                   '<br> Kesimpulan : <b>' +  kesimpulan  + '</b></p>' +
                   '</div>';
      var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/wisata.png') }}"
              });
      var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });
      google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
        });
      return mark;
    }
    else{
        markers2[i].setMap(null);
    }
  }
}

function baik(){
  var btn3 = document.getElementById("gbaik");
  for(var i = 0; i < kmsik.length; i++){
    markers3[i] = addMarker(kmsik[i]);
  }
  // console.log(markers[0]);
  function addMarker(kmsik){
    if(btn3.checked){
      var nama = kmsik.nama_anak;
      var ayah = kmsik.nama_ayah;
      var ibu = kmsik.nama_ibu;
      var lahir = kmsik.ttl;
      var umur = kmsik.umur;
      var lurah = kmsik.kelurahan;
      var rt = kmsik.rt;
      var rw = kmsik.rw;
      var berat = kmsik.bb;
      var timbang = kmsik.bln_penimbangan;
      var tinggi = kmsik.tinggi;
      var jenis = kmsik.jenis_kelamin;
      var kesimpulan = kmsik.kesimpulan_kms;
      var koordinat = kmsik.kordinat;
      var latitude = parseFloat(koordinat.split(',')[0]);
      var longitude = parseFloat(koordinat.split(',')[1]);

      var konten = '<div>' +
                   '<p> Nama Anak : ' + nama +
                   '<br> Nama Ayah : ' + ayah +
                   '<br> Nama Ibu : ' + ibu +
                   '<br> Tanggal Lahir : ' + lahir +
                   '<br> Umur : ' + umur +
                   '<br> Kelurahan : ' + lurah +
                   '<br> RT/RW : ' + rt + '/' + rw +
                   '<br> Berat Badan : ' + berat +
                   '<br> Bulan Penimbangan : ' + timbang +
                   '<br> Tinggi Badan : ' + tinggi +
                   '<br> Jenis Kelamin : ' + jenis +
                   '<br> Kesimpulan : <b>' +  kesimpulan  + '</b></p>' +
                   '</div>';
      var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/mall.png') }}"
              });
      var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });
      google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
        });
      return mark;
    }
    else{
        markers3[i].setMap(null);
    }
  }
}

function lebih(){
  var btn4 = document.getElementById("gl");
  for(var i = 0; i < kmsih.length; i++){
    markers4[i] = addMarker(kmsih[i]);
  }
  // console.log(markers[0]);
  function addMarker(kmsih){
    if(btn4.checked){
      var nama = kmsih.nama_anak;
      var ayah = kmsih.nama_ayah;
      var ibu = kmsih.nama_ibu;
      var lahir = kmsih.ttl;
      var umur = kmsih.umur;
      var lurah = kmsih.kelurahan;
      var rt = kmsih.rt;
      var rw = kmsih.rw;
      var berat = kmsih.bb;
      var timbang = kmsih.bln_penimbangan;
      var tinggi = kmsih.tinggi;
      var jenis = kmsih.jenis_kelamin;
      var kesimpulan = kmsih.kesimpulan_kms;
      var koordinat = kmsih.kordinat;
      var latitude = parseFloat(koordinat.split(',')[0]);
      var longitude = parseFloat(koordinat.split(',')[1]);

      var konten = '<div>' +
                   '<p> Nama Anak : ' + nama +
                   '<br> Nama Ayah : ' + ayah +
                   '<br> Nama Ibu : ' + ibu +
                   '<br> Tanggal Lahir : ' + lahir +
                   '<br> Umur : ' + umur +
                   '<br> Kelurahan : ' + lurah +
                   '<br> RT/RW : ' + rt + '/' + rw +
                   '<br> Berat Badan : ' + berat +
                   '<br> Bulan Penimbangan : ' + timbang +
                   '<br> Tinggi Badan : ' + tinggi +
                   '<br> Jenis Kelamin : ' + jenis +
                   '<br> Kesimpulan : <b>' +  kesimpulan  + '</b></p>' +
                   '</div>';
      var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/puskesmas.png') }}"
              });
      var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });
      google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
        });
      return mark;
    }
    else{
        markers4[i].setMap(null);
    }
  }
}

function gizib(){
  var btn5 = document.getElementById("gbb");
  for(var i = 0; i < balitaburuk.length; i++){
    markers5[i] = addMarker(balitaburuk[i]);
  }
  // console.log(markers[0]);
  function addMarker(balitaburuk){
    if(btn5.checked){
      var nama = balitaburuk.nama_anak;
      var ayah = balitaburuk.nama_ayah;
      var ibu = balitaburuk.nama_ibu;
      var lahir = balitaburuk.ttl;
      var umur = balitaburuk.umur;
      var lurah = balitaburuk.kelurahan;
      var rt = balitaburuk.rt;
      var rw = balitaburuk.rw;
      var berat = balitaburuk.bb;
      var timbang = balitaburuk.bln_penimbangan;
      var tinggi = balitaburuk.tinggi;
      var jenis = balitaburuk.jenis_kelamin;
      var kesimpulan = balitaburuk.kesimpulan_kms;
      var koordinat = balitaburuk.kordinat;
      var latitude = parseFloat(koordinat.split(',')[0]);
      var longitude = parseFloat(koordinat.split(',')[1]);

      var konten = '<div>' +
                   '<p> Nama Anak : ' + nama +
                   '<br> Nama Ayah : ' + ayah +
                   '<br> Nama Ibu : ' + ibu +
                   '<br> Tanggal Lahir : ' + lahir +
                   '<br> Umur : ' + umur +
                   '<br> Kelurahan : ' + lurah +
                   '<br> RT/RW : ' + rt + '/' + rw +
                   '<br> Berat Badan : ' + berat +
                   '<br> Bulan Penimbangan : ' + timbang +
                   '<br> Tinggi Badan : ' + tinggi +
                   '<br> Jenis Kelamin : ' + jenis +
                   '<br> Kesimpulan : <b>' +  kesimpulan  + '</b></p>' +
                   '</div>';
      var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/indomaret.png') }}"
              });
      var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });
      google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
        });
      return mark;
    }
    else{
        markers5[i].setMap(null);
    }
  }
}

function gizik(){
  var btn6 = document.getElementById("gkb");
  for(var i = 0; i < balitakurang.length; i++){
    markers6[i] = addMarker(balitakurang[i]);
  }
  // console.log(markers[0]);
  function addMarker(balitakurang){
    if(btn6.checked){
      var nama = balitakurang.nama_anak;
      var ayah = balitakurang.nama_ayah;
      var ibu = balitakurang.nama_ibu;
      var lahir = balitakurang.ttl;
      var umur = balitakurang.umur;
      var lurah = balitakurang.kelurahan;
      var rt = balitakurang.rt;
      var rw = balitakurang.rw;
      var berat = balitakurang.bb;
      var timbang = balitakurang.bln_penimbangan;
      var tinggi = balitakurang.tinggi;
      var jenis = balitakurang.jenis_kelamin;
      var kesimpulan = balitakurang.kesimpulan_kms;
      var koordinat = balitakurang.kordinat;
      var latitude = parseFloat(koordinat.split(',')[0]);
      var longitude = parseFloat(koordinat.split(',')[1]);

      var konten = '<div>' +
                   '<p> Nama Anak : ' + nama +
                   '<br> Nama Ayah : ' + ayah +
                   '<br> Nama Ibu : ' + ibu +
                   '<br> Tanggal Lahir : ' + lahir +
                   '<br> Umur : ' + umur +
                   '<br> Kelurahan : ' + lurah +
                   '<br> RT/RW : ' + rt + '/' + rw +
                   '<br> Berat Badan : ' + berat +
                   '<br> Bulan Penimbangan : ' + timbang +
                   '<br> Tinggi Badan : ' + tinggi +
                   '<br> Jenis Kelamin : ' + jenis +
                   '<br> Kesimpulan : <b>' +  kesimpulan  + '</b></p>' +
                   '</div>';
      var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/wisata.png') }}"
              });
      var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });
      google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
        });
      return mark;
    }
    else{
        markers6[i].setMap(null);
    }
  }
}

function gizibaik(){
  var btn7 = document.getElementById("gbaikb");
  for(var i = 0; i < balitabaik.length; i++){
    markers7[i] = addMarker(balitabaik[i]);
  }
  // console.log(markers[0]);
  function addMarker(balitabaik){
    if(btn7.checked){
      var nama = balitabaik.nama_anak;
      var ayah = balitabaik.nama_ayah;
      var ibu = balitabaik.nama_ibu;
      var lahir = balitabaik.ttl;
      var umur = balitabaik.umur;
      var lurah = balitabaik.kelurahan;
      var rt = balitabaik.rt;
      var rw = balitabaik.rw;
      var berat = balitabaik.bb;
      var timbang = balitabaik.bln_penimbangan;
      var tinggi = balitabaik.tinggi;
      var jenis = balitabaik.jenis_kelamin;
      var kesimpulan = balitabaik.kesimpulan_kms;
      var koordinat = balitabaik.kordinat;
      var latitude = parseFloat(koordinat.split(',')[0]);
      var longitude = parseFloat(koordinat.split(',')[1]);

      var konten = '<div>' +
                   '<p> Nama Anak : ' + nama +
                   '<br> Nama Ayah : ' + ayah +
                   '<br> Nama Ibu : ' + ibu +
                   '<br> Tanggal Lahir : ' + lahir +
                   '<br> Umur : ' + umur +
                   '<br> Kelurahan : ' + lurah +
                   '<br> RT/RW : ' + rt + '/' + rw +
                   '<br> Berat Badan : ' + berat +
                   '<br> Bulan Penimbangan : ' + timbang +
                   '<br> Tinggi Badan : ' + tinggi +
                   '<br> Jenis Kelamin : ' + jenis +
                   '<br> Kesimpulan : <b>' +  kesimpulan  + '</b></p>' +
                   '</div>';
      var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/mall.png') }}"
              });
      var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });
      google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
        });
      return mark;
    }
    else{
        markers7[i].setMap(null);
    }
  }
}

function gizil(){
  var btn8 = document.getElementById("glb");
  for(var i = 0; i < balitalebih.length; i++){
    markers8[i] = addMarker(balitalebih[i]);
  }
  // console.log(markers[0]);
  function addMarker(balitalebih){
    if(btn8.checked){
      var nama = balitalebih.nama_anak;
      var ayah = balitalebih.nama_ayah;
      var ibu = balitalebih.nama_ibu;
      var lahir = balitalebih.ttl;
      var umur = balitalebih.umur;
      var lurah = balitalebih.kelurahan;
      var rt = balitalebih.rt;
      var rw = balitalebih.rw;
      var berat = balitalebih.bb;
      var timbang = balitalebih.bln_penimbangan;
      var tinggi = balitalebih.tinggi;
      var jenis = balitalebih.jenis_kelamin;
      var kesimpulan = balitalebih.kesimpulan_kms;
      var koordinat = balitalebih.kordinat;
      var latitude = parseFloat(koordinat.split(',')[0]);
      var longitude = parseFloat(koordinat.split(',')[1]);

      var konten = '<div>' +
                   '<p> Nama Anak : ' + nama +
                   '<br> Nama Ayah : ' + ayah +
                   '<br> Nama Ibu : ' + ibu +
                   '<br> Tanggal Lahir : ' + lahir +
                   '<br> Umur : ' + umur +
                   '<br> Kelurahan : ' + lurah +
                   '<br> RT/RW : ' + rt + '/' + rw +
                   '<br> Berat Badan : ' + berat +
                   '<br> Bulan Penimbangan : ' + timbang +
                   '<br> Tinggi Badan : ' + tinggi +
                   '<br> Jenis Kelamin : ' + jenis +
                   '<br> Kesimpulan : <b>' +  kesimpulan  + '</b></p>' +
                   '</div>';
      var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/puskesmas.png') }}"
              });
      var infoWindow = new google.maps.InfoWindow({
          konten: konten,
          maxWidth: 350
        });
      google.maps.event.addListener(mark, 'click', function(){
          infoWindow.setContent(konten);
          infoWindow.open(map, mark);
        });
      return mark;
    }
    else{
        markers8[i].setMap(null);
    }
  }
}

function hapus(){
  var gizi = document.getElementById("gb");
  var btn2 = document.getElementById("gk");
  var btn3 = document.getElementById("gbaik");
  var btn4 = document.getElementById("gl");
  var btn5 = document.getElementById("gbb");
  var btn6 = document.getElementById("gkb");
  var btn7 = document.getElementById("gbaikb");
  var btn8 = document.getElementById("glb");
    if(gizi.checked){
      for(var i = 0; i < kms.length; i++){
        gizi.checked = false;
      markers[i].setMap(null);
    }
  }
  if(btn2.checked){
      for(var i = 0; i < kmsgk.length; i++){
        btn2.checked = false;
      markers2[i].setMap(null);
    }
  }

    if(btn3.checked){
      for(var i = 0; i < kmsik.length; i++){
        btn3.checked = false;
      markers3[i].setMap(null);
    }
  }

    if(btn4.checked){
      for(var i = 0; i < kmsih.length; i++){
        btn4.checked = false;
      markers4[i].setMap(null);
    }
  }

    if(btn5.checked){
      for(var i = 0; i < balitaburuk.length; i++){
        btn5.checked = false;
      markers5[i].setMap(null);
    }
  }

    if(btn6.checked){
      for(var i = 0; i < balitakurang.length; i++){
        btn6.checked = false;
      markers6[i].setMap(null);
    }
  }

    if(btn7.checked){
      for(var i = 0; i < balitabaik.length; i++){
        btn7.checked = false;
      markers7[i].setMap(null);
    }
  }

    if(btn8.checked){
      for(var i = 0; i < balitalebih.length; i++){
        btn8.checked = false;
      markers8[i].setMap(null);
    }
  }
}
</script>
<script>
function dropdown() {
    var x = document.getElementById("dropdown1");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
<script>
var openInbox = document.getElementById("myBtn");
openInbox.click();

function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

function myFunc(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-border-bottom";
    } else {
        x.className = x.className.replace(" w3-show", "");
        x.previousElementSibling.className =
        x.previousElementSibling.className.replace(" w3-border-bottom", "");
    }
}
</script>

@endsection
