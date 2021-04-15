<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Beauty Center</title>
    <link rel="icon" href="img/clinic.ico">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJMyTKzqxEUXFGz9GinAs4yhv2Zz_C7OM&callback=initMap&libraries=&v=weekly"defer></script>
    <style >
    #map {
      height: 100%;
      height: 300px;
    }
      .custom-map-control-button {
        appearance: button;
        background-color: #ffc107;
        border: 0;
        border-radius: 2px;
        box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
        cursor: pointer;
        margin: 10px;
        padding: 0 0.5em;
        height: 40px;
        font: 400 18px Roboto, Arial, sans-serif;
        overflow: hidden;
      }
      .custom-map-control-button:hover {
        background: #ebebeb;
      }
    </style>
  </head>
  <body>
        <div class="container w-100" id="map" ></div>

    <script>
      let map, infoWindow;
      var geocoder;
      var GGM;
      function initMap() {
        GGM=new Object(google.maps);
        var position = { lat:16.248913793731973, lng:103.25206214484201 };
        geocoder = new GGM.Geocoder();
        map = new google.maps.Map(document.getElementById("map"), {
          center: position,
          zoom: 15,
        });
        let infoWindow = new google.maps.InfoWindow({
                 content: "คลิกเพื่อค้นหาตำแหน่ง ละติจูด,ลองติจูด",
                 position: position,
               });

               infoWindow.open(map);
               map.addListener("click", (mapsMouseEvent) => {
                 infoWindow.close();
                 infoWindow = new google.maps.InfoWindow({
                   position: mapsMouseEvent.latLng,
                 });

                var my_Point = infoWindow.getPosition();
                 $("#lat_value").val(my_Point.lat());
                 $("#lon_value").val(my_Point.lng());
                infoWindow.setContent('ตำแหน่งของคุณคือ lat: ' + my_Point.lat() + ', lng: ' + my_Point.lng() + ' ');
                 infoWindow.open(map);
                 geocoder.geocode({'latLng': my_Point}, function(results, status) {
                  if (status == google.maps.GeocoderStatus.OK) {
                    if (results[1]) {
                        $("#place_value").val(results[1].formatted_address); //
                    }
                  } else {
                    alert("Geocoder failed due to: " + status);
                  }
                  });
               });
        const locationButton = document.createElement("button");
        locationButton.textContent = "คลิกเพื่อค้นหาตำแหน่งปัจจุบัน";
        locationButton.classList.add("custom-map-control-button");
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(
          locationButton
        );
        locationButton.addEventListener("click", () => {
          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
              (position) => {
                const pos = {
                  lat: position.coords.latitude,
                  lng: position.coords.longitude,
                };

                $("#lat_value").val(pos.lat);
                $("#lon_value").val(pos.lng);
                geocoder.geocode({'latLng': pos}, function(results, status) {
                 if (status == google.maps.GeocoderStatus.OK) {
                   if (results[1]) {
                       $("#place_value").val(results[1].formatted_address); //
                   }
                 } else {
                   alert("Geocoder failed due to: " + status);
                 }
                 });

                infoWindow.setPosition(pos);
                infoWindow.setContent('ตำแหน่งปัจจุบันของคุณคือ lat: ' + position.coords.latitude + ', lng: ' + position.coords.longitude + ' ');
                infoWindow.open(map);
                map.setCenter(pos);
              },
              () => {
                handleLocationError(true, infoWindow, map.getCenter());
              }
            );
          } else {
            handleLocationError(false, infoWindow, map.getCenter());
          }
        });
      }
      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(
          browserHasGeolocation
            ? "Error: The Geolocation service failed."
            : "Error: Your browser doesn't support geolocation."
        );
      //   infoWindow.open(map);
      }
    </script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>

</body>
</html>
