<?php
header("Content-type:application/json; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
require_once("connect/connect.php");
$json_data = array();
$sql = "SELECT * FROM clinic WHERE Status = 1 ORDER BY clinic_ID";
$result=mysqli_query($dbConnect,$sql);
if($result && $result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $json_data[] = array(
            "clinic_ID" => $row['clinic_ID'],
            "clinic_Name" => $row['clinic_Name'],
            "latitude" => $row['latitude'],
            "longitude" => $row['longitude']
        );
    }
}
// แปลง array เป็นรูปแบบ json string
if(isset($json_data)){
    $json= json_encode($json_data);
    if(isset($_GET['callback']) && $_GET['callback']!=""){
    echo $_GET['callback']."(".$json.");";
    }else{
    echo $json;
    }
}
?>
