<?php
include ('../connect/connect.php');
session_start();
$payment_ID = $_POST["payment_ID"];
$clinic_Views = 0;
$clinic_ID = $_POST["clinic_ID"];
$payment_Status = $_POST["payment_Status"];
$Status = 1;
$sql = "UPDATE  payment SET payment_Status='$payment_Status' WHERE payment_ID = '$payment_ID' ";
$RESULT1=mysqli_query($dbConnect,$sql);

$sql2 = "UPDATE  clinic SET clinic_Views = '$clinic_Views' , Status = '$Status'  WHERE clinic_ID = '$clinic_ID' ";
$RESULT2=mysqli_query($dbConnect,$sql2);

if($RESULT1 and $RESULT2 ){
	echo  "บันทึกข้อมูลเรียบร้อยแล้วค่ะ";
}else{
	echo "ไม่สามารถบันทึกข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ";
}
echo'<meta http-equiv="refresh" content="2;url=index.php">';

?>
