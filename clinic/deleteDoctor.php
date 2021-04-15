<?php
include ('connect/connect.php');
$doctor_ID=$_GET["doctor_ID"];
 $SQL1="DELETE FROM doctor WHERE doctor_ID='$doctor_ID'";
 $RESULT1=mysqli_query($dbConnect,$SQL1);
 if($RESULT1){
	 echo "ลบข้อมูลเรียบร้อยแล้ว....";
 }else{
	 echo "ไม่สามารถลบข้อมูลได้....";
 }
echo '<meta http-equiv="refresh" content="1;url=registerDoctor.php">';
mysqli_close($dbConnect);

?>
