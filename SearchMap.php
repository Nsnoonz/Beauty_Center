<?php require_once('connect/connect.php'); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Beauty Center</title>
    <link rel="icon" href="img/clinic.ico">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/webstyle.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>
      <style type="text/css">
    /* css กำหนดความกว้าง ความสูงของแผนที่ */
    #map_canvas {
      height: 100%;
      height: 400px;
    }
    </style>
  </head>

<body class="Myfont">
  <?php
  include("navbar.php");
  include("nav.php");
  ?>
  <div class="container  Myfont border-top" >
    <br>
    <center>
<div class="col-9 w-100" >
  <input name="namePlace"class="w-75" type="text" id="namePlace" placeholder="ค้นหาอำเภอหรือจังหวัด"size="40" />
 <input type="button" class="btn btn-sm btn-primary" name="SearchPlace" id="SearchPlace" value="Search" /><br>
 <br>
  <div id="map_canvas"></div>
</center>
</div>
<div style="height:200px;"></div>
<?php include("footer.php"); ?>
</div>
<script src="//unpkg.com/jquery@3.2.1"></script>
<script type="text/javascript">
var geocoder;
var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้
var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น
var my_Marker=[]; // กำหนดตัวแปรสำหรับเก็บตัว marker เป็นตัวแปร array
var infowindow=[]; // กำหนดตัวแปรสำหรับเก็บตัว popup แสดงรายละเอียดสถานที่
var infowindowTmp; // กำหนดตัวแปรสำหรับเก็บลำดับของ infowindow ที่เปิดล่าสุด
function initialize() { // ฟังก์ชันแสดงแผนที่
    GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM
    // กำหนดจุดเริ่มต้นของแผนที่
    geocoder = new GGM.Geocoder();
    var my_Latlng  = new GGM.LatLng(13.7278956,100.52412349999997);
    // กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas
    var my_DivObj=$("#map_canvas")[0];
    // กำหนด Option ของแผนที่
    var myOptions = {
        zoom: 10, // กำหนดขนาดการ zoom
        center: my_Latlng , // กำหนดจุดกึ่งกลาง
        mapTypeId:GGM.MapTypeId.ROADMAP, // กำหนดรูปแบบแผนที่
        mapTypeControlOptions:{ // การจัดรูปแบบส่วนควบคุมประเภทแผนที่
            position:GGM.ControlPosition.TOP, // จัดตำแหน่ง
            style:GGM.MapTypeControlStyle.DROPDOWN_MENU // จัดรูปแบบ style
        }
    };
    map = new GGM.Map(my_DivObj,myOptions);// สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map
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

    $.ajax({
        url:"genMarker.php", // ใช้ ajax ใน jQuery เรียกใช้ไฟล์ json
        method: "POST",
        dataType: "json",
        success:function(data){
            if(data && typeof data == 'object'){
                $.each(data,function(k,dataValue){
                    var markerID=dataValue.clinic_ID;// นำค่าต่างๆ มาเก็บไว้ในตัวแปรไว้ใช้งาน
                    var markerName=dataValue.clinic_Name; // นำค่าต่างๆ มาเก็บไว้ในตัวแปรไว้ใช้งาน
                    var markerLat=dataValue.latitude; // นำค่าต่างๆ มาเก็บไว้ในตัวแปรไว้ใช้งาน
                    var markerLng=dataValue.longitude; // นำค่าต่างๆ มาเก็บไว้ในตัวแปรไว้ใช้งาน
                    var markerLatLng=new GGM.LatLng(markerLat,markerLng);
                    my_Marker[k] = new GGM.Marker({ // สร้างตัว marker
                        position:markerLatLng,  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง
                        map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map
                        title:markerName // แสดง title เมื่อเอาเมาส์มาอยู่เหนือ
                    });

                    //  กรณีตัวอย่าง ดึง title ของตัว marker มาแสดง
                    infowindow[k] = new GGM.InfoWindow({// สร้าง infowindow ของแต่ละ marker เป็นแบบ array
                        content: my_Marker[k].getTitle() // ดึง title ในตัว marker มาแสดงใน infowindow
                    });
    //              //  กรณีนำไปประยุกต์ ดึงข้อมูลจากฐานข้อมูลมาแสดง
                 infowindow[k] = new GGM.InfoWindow({
                     content:$.ajax({
                         url:'placeDetail.php',//ใช้ ajax ใน jQuery ดึงข้อมูล
                         data:'placeID='+markerID,// ส่งค่าตัวแปร ไปดึงข้อมูลจากฐานข้อมูล
                         async:false
                     }).responseText
                 });

                    GGM.event.addListener(my_Marker[k], 'click', function(){ // เมื่อคลิกตัว marker แต่ละตัว
                        if(infowindowTmp){ // ให้ตรวจสอบว่ามี infowindow ตัวไหนเปิดอยู่หรือไม่
                            infowindow[infowindowTmp].close();  // ถ้ามีให้ปิด infowindow ที่เปิดอยู่
                        }
                        infowindow[k].open(map, my_Marker[k]); //  แสดง info window
                        infowindowTmp=k;
                        map.panTo(infowindow[k].getPosition()); // เลื่อนไปที่ marker ที่คลิก
                    });

                }); // end loop data
            } // end check data
        }   // end success
    });    // End ajax function

}
$(function(){
    $("<script/>", {
      "type": "text/javascript",
      src: "//maps.google.com/maps/api/js?v=3.2&key=AIzaSyBJMyTKzqxEUXFGz9GinAs4yhv2Zz_C7OM&sensor=false&language=th&callback=initialize"
    }).appendTo("body");
});
</script>
</body>
</html>
