<?php
include ('../connect/connect.php');
session_start();
 $booking_ID = $_POST["booking_ID"];
 $booking_Statu = $_POST["booking_Statu"];
 $booking_Note = $_POST["booking_Note"];
$time_update = $_POST["time_update"];
$sql = "UPDATE  booking SET booking_Note='$booking_Note$time_update' , booking_Statu='$booking_Statu'
WHERE booking_ID = '$booking_ID' ";
$RESULT1=mysqli_query($dbConnect,$sql);
if($RESULT1){ ?>
<script type="text/javascript"> alert("บันทึกข้อมูลเรียบร้อยแล้วค่ะ"); </script>
<?php }else{ ?>
<script type="text/javascript"> alert("ไม่สามารถบันทึกข้อมูลได้กรุณาลองใหม่อีกครั้ง"); </script>
<?php } ?>
<script type="text/javascript"> window.location='index.php?clinic_ID=<?php echo  $_SESSION["clinic_ID"]; ?>&token=<?php echo md5( $_SESSION['clinic_ID'].'@Confirm'); ?>'; </script>
<?php mysqli_close($dbConnect); ?>
