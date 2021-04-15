<?php
include ('../connect/connect.php');
 $clinicDay_Name = $_POST['clinicDay_Name'];
 $clinicDay_Start = $_POST['clinicDay_Start'];
 $clinicDay_End = $_POST['clinicDay_End'];
 $clinic_ID = $_POST['clinic_ID'];
$sql = "insert into clinicday (clinicDay_Name,clinicDay_Start,clinicDay_End,clinic_ID)
            value('$clinicDay_Name','$clinicDay_Start','$clinicDay_End','$clinic_ID') ";
$RESULT1=mysqli_query($dbConnect,$sql);
if($RESULT1){?>
  <script>	alert("เพิ่มข้อมูลเรียบร้อยแล้วค่ะ");	</script>
<?php	}else{?>
  <script>	alert("ไม่สามารถเพิ่มข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ");</script>
<?php	} ?>
<script>
 window.location='clinicDay.php?clinic_ID=<?php echo  $clinic_ID; ?>&token=<?php echo md5( $clinic_ID.'@Confirm'); ?>';
</script>

<?php
  mysqli_close($dbConnect);


?>
