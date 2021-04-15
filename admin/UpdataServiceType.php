<?php
include ('../connect/connect.php');
session_start();
$serviceType_ID = $_POST["serviceType_ID"];
$serviceType_Name = $_POST['serviceType_Name'];
$sql = "UPDATE  servicetype SET serviceType_Name='$serviceType_Name' WHERE serviceType_ID = '$serviceType_ID' ";
$RESULT1=mysqli_query($dbConnect,$sql);
if($RESULT1){
	echo  "บันทึกข้อมูลเรียบร้อยแล้วค่ะ";
}else{
	echo "ไม่สามารถบันทึกข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ";
}
echo'<meta http-equiv="refresh" content="2;url=registerServiceType.php">';

	mysqli_close($dbConnect);

?>
