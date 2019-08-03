
<div id="mapid" style="height: 1000px; width:98%; float:right;"></div>
<div id='response'></div>

<script src="/js/jquery-3.2.1.min.js"></script>
<script>
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }

    function showPosition(position) {
        lat = position.coords.latitude;
        long = position.coords.longitude;
        var mymap = L.map('mapid').setView([35.70108201329604, 51.40118252358662], 13);
        //var mymap = L.map('mapid').setView([lat,long], 13);
        //var marker = L.marker([35.700317, 51.427788]).addTo(mymap);
        /*var circle = L.circle([35.70108201329604, 51.40118252358662], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 500
        }).addTo(mymap);*/
        /* var polygon = L.polygon([
             [51.509, -0.08],
             [51.503, -0.06],
             [51.51, -0.047]
         ]).addTo(mymap);
         marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();
         circle.bindPopup("I am a circle.");
         polygon.bindPopup("I am a polygon.");
         var popup = L.popup()
             .setLatLng([51.5, -0.09])
             .setContent("I am a standalone popup.")
             .openOn(mymap);
             var popup = L.popup();
         */
        var theMarker = {};


        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiaWxpYTciLCJhIjoiY2p5dmo3MzY2MGxrMDNtbnk3bmM3aHVpMiJ9.jRxqf0RUHWEpYXThmcIBEQ', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox.streets',
            //id:'mapbox.satellite',
            accessToken: 'pk.eyJ1IjoiaWxpYTciLCJhIjoiY2p5dmo3MzY2MGxrMDNtbnk3bmM3aHVpMiJ9.jRxqf0RUHWEpYXThmcIBEQ'
        }).addTo(mymap);

        @foreach ($house as $i=>$data)
                @if($data->lat!=null)
            lat = "<?php echo $data->lat ?>";
        long = "<?php echo $data->long ?>";
        theMarker = L.marker([lat, long]).addTo(mymap);
        @endif
        @endforeach
    }
</script>
 