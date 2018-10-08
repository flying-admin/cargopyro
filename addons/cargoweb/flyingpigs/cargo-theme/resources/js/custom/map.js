$(function(){

  // API Key: AIzaSyBYC_HIH5QDJ0hX9EV3KGuiN360v8X01oo
  // Clusters Docs: https://htmlpreview.github.io/?https://github.com/googlemaps/v3-utility-library/blob/master/markerclustererplus/docs/reference.html

  if ( $('.map').length > 0 ) {
    initMap();

    // google.maps.event.addDomListener(window, 'load', initMap);
  }

});

var map, markerImg, markerShape, clusterImg, clusterShape, locations;


var myPosLat, myPosLong, myip;
var xmlhttpmyip = new XMLHttpRequest();
var urlmyip = "https://api.ipgeolocation.io/getip";

xmlhttpmyip.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    var myipResp = JSON.parse(this.responseText);
    myip = myipResp.ip;


    var xmlhttpgeo = new XMLHttpRequest();
    var urlgeo = "https://api.ipgeolocation.io/ipgeo?ip=" + myip + "&apiKey=4629ad0028244781981d43d142e9e6fa";

    xmlhttpgeo.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var geoResp = JSON.parse(this.responseText);

        myPosLat = geoResp.latitude;
        myPosLong = geoResp.longitude;

        $(document).ready(function() {
          var distances = [];

          for ( loc in locations ) {
            place = locations[loc];
            distances[place.tag] = distance(myPosLat, myPosLong, place.lat, place.lng);
          }

          var closestLocation = minValAssociative(distances);

          var closestPlace = locations.find(function(o) { if (o.tag === closestLocation) { return o; } });

          $('.header .phone-number a').attr('href', 'tel:' + closestPlace.tel);
          $('.header .phone-number .text').text(closestPlace.tel);

          $('.header .mail-address a').attr('href', 'mailto:' + closestPlace.mail);
          $('.header .mail-address .text').text(closestPlace.mail);

          $('.localiza-oficina').on('click', function(ev) {
            ev.preventDefault();
            map.setCenter({lat: parseFloat(closestPlace.lat), lng: parseFloat(closestPlace.lng)});
          });

        });
      }

    };
    xmlhttpgeo.open("GET", urlgeo, true);
    xmlhttpgeo.send();
  }

};
xmlhttpmyip.open("GET", urlmyip, true);
xmlhttpmyip.send();

locations = [
  {lat: 40.404867,  lng: -3.673120,   tag: 'madrid',    tel: '+34 914 341 820',   mail: 'infomad@cargoservicesgroup.com'}, // Madrid
  {lat: 41.389582,  lng: 2.173952,    tag: 'barcelona', tel: '+34 933 019 633',   mail: 'infobcn@cargoservicesgroup.com'}, // Barcelona
  {lat: 42.810118,  lng: -1.660274,   tag: 'pamplona',  tel: '+34 948 172 245',   mail: 'infopna@cargoservicesgroup.com'}, // Pamplona
  {lat: 54.511266,  lng: 18.541763,   tag: 'polonia',   tel: '+48 58 668 44 18',  mail: 'infopol@cargoservicesgroup.com'}, // Polonia
  {lat: 19.410481,  lng: -99.181033,  tag: 'mexico',    tel: '+52 55 5543 2007',  mail: 'comercial@cargoservicesgroup.com.mx'}, // Mexico
  {lat: 8.983290,   lng: -79.515534,  tag: 'panama',    tel: '+507 303 2320',     mail: 'infopan@cargoservicesgroup.com'}, // Panama
  {lat: 23.1196734, lng: -82.4282338, tag: 'cuba',      tel: '+537 204 7211',     mail: 'n.carnota@cargoservicesgroup.cu'} // Cuba
];



function initMap(){
    var host = window.location.protocol + "//" +  window.location.host ;


  markerImg = {
      url: host + '/images/content/marker.png',
      size: new google.maps.Size(36, 36),
      origin: new google.maps.Point(0,0),
      anchor: new google.maps.Point(18, 18),
      scaledSize: new google.maps.Size(36, 36)
  };

  markerShape = {
      coords: [0, 0, 36, 0, 36, 36, 0, 36],
      type: 'poly'
  };

  clusterImg = host + '/images/content/cluster';
  clusterExt = 'svg';

  initContactMap();
}


function initContactMap() {

  // Initialize map.
  var wrapper = document.getElementsByClassName('map__map')[0];
  map = new google.maps.Map(wrapper, {
    zoom: 3,
    center: {lat: 0, lng: 0}
  });

  // Add some markers to the map.
  // Note: The code uses the JavaScript Array.prototype.map() method to
  // create an array of markers based on a given "locations" array.
  // The map() method here has nothing to do with the Google Maps API.
  var markers = locations.map(function(location, i) {
    return new google.maps.Marker({
      position: location,
      map: map,
      icon: markerImg,
      shape: markerShape,
    });
  });

  var clusterOpts = {
    styles: [
      {
        anchorIcon: [18, 18],
        height: 36,
        width: 36,
        url: clusterImg + '1.' + clusterExt,
        textColor: 'white',
        textSize: 16
      },
      {
        anchorIcon: [18, 18],
        height: 36,
        width: 36,
        url: clusterImg + '2.' + clusterExt,
        textColor: 'white',
        textSize: 16
      },
      {
        anchorIcon: [18, 18],
        height: 36,
        width: 36,
        url: clusterImg + '3.' + clusterExt,
        textColor: 'white',
        textSize: 16
      },
      {
        anchorIcon: [18, 18],
        height: 36,
        width: 36,
        url: clusterImg + '4.' + clusterExt,
        textColor: 'white',
        textSize: 16
      },
      {
        anchorIcon: [18, 18],
        height: 36,
        width: 36,
        url: clusterImg + '5.' + clusterExt,
        textColor: 'white',
        textSize: 16
      },
    ]
  }
  // Add a marker clusterer to manage the markers.
  var markerCluster = new MarkerClusterer(map, markers, clusterOpts);

  // Set map bounds with all markers
  boundsMarkers(markers);
}

function boundsMarkers(marcadores){
  var bounds = new google.maps.LatLngBounds();
  for (var i = 0; i < marcadores.length; i++) {
    bounds.extend(marcadores[i].getPosition());
  }
  map.fitBounds(bounds); // Adjust map view to contain all markers
  map.panTo(bounds.getCenter()); // Fix to avoid markers disappearence (happens sometimes with map.setCenter and map.fitBounds)
}


function minValAssociative(arr) {
  var minValue;
  var minKey;
  for (key in arr) {
    if (minValue != undefined) {
      if ( arr[key] < minValue ) {
        minValue = arr[key];
        minKey = key;
      }
    } else {
      minValue = arr[key];
      minKey = key;
    }
  }
  return minKey;
}

function distance(lat1, lon1, lat2, lon2, unit) {
  var radlat1 = Math.PI * lat1/180
  var radlat2 = Math.PI * lat2/180
  var theta = lon1-lon2
  var radtheta = Math.PI * theta/180
  var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
  dist = Math.acos(dist)
  dist = dist * 180/Math.PI
  dist = dist * 60 * 1.1515
  if (unit=="K") { dist = dist * 1.609344 }
  if (unit=="N") { dist = dist * 0.8684 }
  return dist
}
