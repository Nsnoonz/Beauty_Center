<?php
include ('../connect/connect.php');
session_start();
 $clinic_ID = $_POST["clinic_ID"];
 $Status = $_POST["button"];
 $Status_Note = $_POST["Status_Note"];
$sql = "UPDATE  clinic SET Status_Note='$Status_Note' , Status='$Status'
WHERE clinic_ID = '$clinic_ID' ";
$RESULT1=mysqli_query($dbConnect,$sql);
if($RESULT1){
	echo  "บันทึกข้อมูลเรียบร้อยแล้วค่ะ";
}else{
	echo "ไม่สามารถบันทึกข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ";
}
echo'<meta http-equiv="refresh" content="2;url=../AllClinic.php">';

	mysqli_close($dbConnect);
?>
