<?php
include ('../connect/connect.php');
$doctor_ID=$_GET["doctor_ID"];
$clinic_ID=$_GET["clinic_ID"];
$clinic_ID;
 $SQL1="DELETE FROM doctor WHERE doctor_ID='$doctor_ID'";
 $RESULT1=mysqli_query($dbConnect,$SQL1);
 if($RESULT1){?>	<script>	alert("ลบข้อมูลเรียบร้อยแล้วค่ะ");	</script>
 <?php	}else{?><script>	alert("ไม่สามารถลบข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ");</script>
 <?php	} ?>
 <script>
  window.location='AllDoctor.php?clinic_ID=<?php echo  $clinic_ID; ?>&token=<?php echo md5( $clinic_ID.'@Confirm'); ?>';
 </script>
 <?php
 mysqli_close($dbConnect);

 ?>
