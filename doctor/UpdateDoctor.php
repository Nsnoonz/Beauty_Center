<?php
include ('../connect/connect.php');
$doctor_ID = $_POST['doctor_ID'];
$doctor_Name = $_POST['doctor_Name'];
$doctor_License = $_POST['doctor_License'];
$doctor_Surname = $_POST['doctor_Surname'];
$doctor_Details = $_POST['doctor_Details'];
$clinic_ID = $_POST['clinic_ID'];


$sql = "UPDATE  doctor SET doctor_License='$doctor_License',doctor_Name='$doctor_Name',doctor_Surname='$doctor_Surname'
,doctor_Details='$doctor_Details',clinic_ID='$clinic_ID' WHERE doctor_ID = '$doctor_ID' ";
$RESULT1=mysqli_query($dbConnect,$sql);
if($RESULT1){
	echo  "บันทึกข้อมูลเรียบร้อยแล้วค่ะ";
}else{
	echo "ไม่สามารถบันทึกข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ";
}
?>
<script type="text/javascript">
	window.location='AllDoctor.php?clinic_ID=<?php echo  $clinic_ID; ?>&token=<?php echo md5( $clinic_ID.'@Confirm'); ?>';
</script>

	<?php mysqli_close  ($dbConnect);

?>
