<?php
include ('../connect/connect.php');
$service_ID = $_POST['service_ID'];
$service_Name = $_POST['service_Name'];
$service_Description = $_POST['service_Description'];
$service_Price = $_POST['service_Price'];
$serviceType_ID = $_POST['serviceType_ID'];
$clinic_ID = $_POST['clinic_ID'];

$sql = "UPDATE  service SET service_Name='$service_Name',service_Description='$service_Description'
,service_Price='$service_Price',serviceType_ID='$serviceType_ID' WHERE service_ID = '$service_ID' ";
  $RESULT1=mysqli_query($dbConnect,$sql);
  if($RESULT1){?>	<script>	alert("แก้ไขข้อมูลเรียบร้อยแล้วค่ะ");	</script>
<?php	}else{?><script>	alert("ไม่สามารถแก้ไขข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ");</script>
  <?php	} ?>
  <script>
   window.location='AllService.php?clinic_ID=<?php echo  $clinic_ID; ?>&token=<?php echo md5( $clinic_ID.'@Confirm'); ?>';
  </script>
  <?php
    mysqli_close($dbConnect);


?>
