<?php
include ('../connect/connect.php');
$clinicDay_ID = $_POST['clinicDay_ID'];
$clinicDay_Name = $_POST['clinicDay_Name'];
$clinicDay_Start = $_POST['clinicDay_Start'];
$clinicDay_End = $_POST['clinicDay_End'];
$clinic_ID = $_POST['clinic_ID'];

$sql = "UPDATE  clinicday SET clinicDay_Name='$clinicDay_Name',clinicDay_Start='$clinicDay_Start',clinicDay_End='$clinicDay_End',
        clinic_ID='$clinic_ID' WHERE clinicDay_ID = '$clinicDay_ID' ";
$RESULT1=mysqli_query($dbConnect,$sql);
if($RESULT1){?>	<script>	alert("แก้ไขข้อมูลเรียบร้อยแล้วค่ะ");	</script>
<?php	}else{?><script>	alert("ไม่สามารถแก้ไขข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ");</script>
<?php	} ?>
<script>
 window.location='clinicDay.php?clinic_ID=<?php echo  $clinic_ID; ?>&token=<?php echo md5( $clinic_ID.'@Confirm'); ?>';
</script>
<?php
  mysqli_close($dbConnect);


?>
