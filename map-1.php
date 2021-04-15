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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>
    <style >
    #map {
      height: 100%;
      height: 400px;
    }
        </style>
      </head>
      <body>
        <div class="container w-100" id="map" ></div>
        <input name="namePlace" type="text" id="namePlace" placeholder="ค้นหาอำเภอหรือจังหวัด"size="40" />
       <input type="button" name="SearchPlace" id="SearchPlace" value="Search" />
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

      }//จบ initMap()
      $(function(){
    var searchPlace=function(){
        var AddressSearch=$("#namePlace").val();
        if(geocoder){
            geocoder.geocode({
                 address: AddressSearch
            },function(results, status){
                if(status == GGM.GeocoderStatus.OK) {
                    var my_Point=results[0].geometry.location;
                    const marker = new google.maps.Marker({
                      position: my_Point,
                      map,
                    });
                    map.setCenter(my_Point);
                    marker.setMap(map);
                    marker.setPosition(my_Point);
                }else{
                    // ค้นหาไม่พบแสดงข้อความแจ้ง
                    alert("Geocode was not successful for the following reason: " + status);
                    $("#namePlace").val("");// กำหนดค่า textbox id=namePlace ให้ว่างสำหรับค้นหาใหม่
                 }
            });
        }
    }
    $("#SearchPlace").click(function(){ // เมื่อคลิกที่ปุ่ม id=SearchPlace ให้ทำงานฟังก์ฃันค้นหาสถานที่
        searchPlace();  // ฟังก์ฃันค้นหาสถานที่
    });
    $("#namePlace").keyup(function(event){ // เมื่อพิมพ์คำค้นหาในกล่องค้นหา
        if(event.keyCode==13){  //  ตรวจสอบปุ่มถ้ากด ถ้าเป็นปุ่ม Enter ให้เรียกฟังก์ชันค้นหาสถานที่
            searchPlace();      // ฟังก์ฃันค้นหาสถานที่
        }
    });

});
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

</body>
</html>
