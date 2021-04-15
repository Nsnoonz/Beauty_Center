<?php
include ('../connect/connect.php');
$clinic_ID=$_GET["clinic_ID"];
 $SQL1="DELETE FROM clinic WHERE clinic_ID='$clinic_ID'";
 $RESULT1=mysqli_query($dbConnect,$SQL1);
 if($RESULT1){
	 echo "ลบข้อมูลเรียบร้อยแล้ว....";
 }else{
	 echo "ไม่สามารถลบข้อมูลได้....";
 }
echo '<meta http-equiv="refresh" content="1;url=../AllClinic.php">';
mysqli_close($dbConnect);

?>
