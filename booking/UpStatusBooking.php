<?php
include ('../connect/connect.php');
session_start();
$booking_ID = $_REQUEST["booking_ID"];
$booking_Statu = $_POST["booking_Statu"];
$sql = "UPDATE  booking SET booking_Statu='2' WHERE booking_ID = '$booking_ID' ";
$RESULT1=mysqli_query($dbConnect,$sql);
if($RESULT1){ ?>
<script type="text/javascript"> alert("ยกเลิกการจองเรียบร้อยแล้วค่ะ"); </script>
<?php }else{ ?>
<script type="text/javascript"> alert("ไม่สามารถยกเลิกการจองได้กรุณาลองใหม่อีกครั้ง"); </script>
<?php } ?>
<script type="text/javascript"> window.location='AllBooking.php?member_ID=<?php echo  $_SESSION["member_ID"]; ?>&token=<?php echo md5( $_SESSION['member_ID'].'@Confirm'); ?>'; </script>
