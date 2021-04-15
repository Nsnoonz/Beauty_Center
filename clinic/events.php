<?php
header("Content-type:application/json; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
// โค้ดไฟล์ dbconnect.php ดูได้ที่ http://niik.in/que_2398_5642
 require_once("../connect/connect.php");
 session_start();
$start = $_GET['gData'];
$num =  $_SESSION["clinic_ID"];
$json_data = array();
$sql =" SELECT * FROM booking,service,clinic
WHERE service.service_ID = booking.service_ID and service.clinic_ID = clinic.clinic_ID and service.clinic_ID >= $num and booking.booking_Date>= $start";
$result = mysqli_query($dbConnect, $sql);
if(mysqli_affected_rows($dbConnect)>0){
  while($row = mysqli_fetch_array($result)){
        $_start_date = $row['booking_Date'];
        $_start_time = false;
        if($row['booking_Time']!="00:00:00"){
        $_start_date = $row['booking_Date']."T".$row['booking_Time'];
        }

        $arr_eventData = array(
            "id" => $row['booking_ID'],
            "groupId" => str_replace("-","",$row['booking_Date']),
            "start" => $_start_date,
            "startTime" => $_start_time,
            "title" => $row['service_Name'],
            "url" => "",
            "textColor" => "",
            "backgroundColor" => ";",
            "borderColor" => "",
        );
        if(!$_start_time){unset($arr_eventData['booking_Time']);}
        $json_data[] = $arr_eventData;
    }
}
if(isset($json_data)){
    $json= json_encode($json_data, JSON_UNESCAPED_UNICODE);

    if(isset($_GET['callback']) && $_GET['callback']!=""){
    echo $_GET['callback']."(".$json.");";
    }else{
    echo $json;
    }
}
?>
