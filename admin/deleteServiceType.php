<?php
include ('../connect/connect.php');
$serviceType_ID=$_GET["serviceType_ID"];
 $SQL1="DELETE FROM servicetype WHERE serviceType_ID='$serviceType_ID'";
 $RESULT1=mysqli_query($dbConnect,$SQL1);
 if($RESULT1){
	 echo "ลบข้อมูลเรียบร้อยแล้ว....";
 }else{
	 echo "ไม่สามารถลบข้อมูลได้....";
 }
echo '<meta http-equiv="refresh" content="1;url=registerServiceType.php">';
mysqli_close($dbConnect);

?>
