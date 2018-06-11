@extends('adminlte::layouts.app')

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
    <a id="myBtn" onclick="myFunc('Demo1')" href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom" style="padding: 12px 1.5em; text-decoration: none;"><i class="fa fa-child w3-medium" style="margin-right: 7px;"></i> Bayi </a>
      <div id="Demo1" class="w3-hide w3-animate-left w3-text-gray" style="padding: 5px 2em 1em; border-bottom: 1px solid #ccc;">
        <input type="checkbox" class="checkbox" id="gb" onclick="buruk()"> Gizi Buruk <br>
        <input type="checkbox" class="checkbox" id="gk" onclick="kurang()"> Gizi Kurang <br>
        <input type="checkbox" class="checkbox" id="gbaik" onclick="baik()"> Gizi Baik <br>
        <input type="checkbox" class="checkbox" id="gl" onclick="lebih()"> Gizi Lebih <br>
      </div>
    <a id="myBtn" onclick="myFunc('Demo2')" href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom" style="padding: 12px 1.5em; text-decoration: none;"><i class="fa fa-child w3-medium" style="margin-right: 7px;"></i> Balita </a>
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
// var gizi = document.getElementById("gb");

var markers =[];

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
                   '<p><b> Nama Anak : <b>' + nama +
                   '<br><b> Nama Ayah : <b>' + ayah +
                   '<br><b> Nama Ibu : <b>' + ibu +
                   '<br><b> Tanggal Lahir : <b>' + lahir +
                   '<br><b> Umur : <b>' + umur +
                   '<br><b> Kelurahan : <b>' + lurah +
                   '<br><b> RT/RW : <b>' + rt + '/' + rw +
                   '<br><b> Berat Badan : <b>' + berat +
                   '<br><b> Bulan Penimbangan : <b>' + timbang +
                   '<br><b> Tinggi Badan : <b>' + tinggi +
                   '<br><b> Jenis Kelamin : <b>' + jenis +
                   '<br><b> Kesimpulan : <b>' + kesimpulan + '</p>' +
                   '</div>';
      var mark = new google.maps.Marker({
                  map: map,
                  position: {lat: latitude, lng: longitude},
                  icon: "{{ asset('img/marker/pdam.png') }}"
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
