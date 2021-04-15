<?php
   include '../connect/connect.php';

//    if ($_POST) {
//     echo '<pre>';
//     echo htmlspecialchars(print_r($_POST, true));
//     echo '</pre>';
// }
  $clinic_ID = $_POST['clinic_ID'];
  $service_ID = $_POST['service_ID'];
  $member_ID = $_POST['member_ID'];
  // $booking_Note = $_POST['booking_Note'];
  $booking_Time = $_POST['booking_Time'];
  $date=$_POST["booking_Date"];
  $booking_Statu = 0 ;

  $sql = "SELECT * FROM clinicday WHERE clinic_ID =   $clinic_ID " ;
  $result=mysqli_query($dbConnect,$sql);
  $resultArray = array();
  while ($record = mysqli_fetch_array($result)) {
      array_push ( $resultArray,$record["clinicDay_Name"]);
  }
$DayOfWeek = date("D", strtotime($date));
// echo $DayOfWeek = strtolower($DayOfWeek);
// echo $DayOfWeek = date("w", strtotime($date));
if ( !in_array ($DayOfWeek,$resultArray))
{ ?>
  <script type="text/javascript">
  alert("ไม่สามารถทำการจองได้ กรุณาเลือกวันอื่น");
  window.location='../booking.php?service_ID=<?php echo $service_ID; ?>&member_ID=<?php echo $member_ID; ?>&token=<?php echo md5( $member_ID.'@Confirm'); ?> ';
  </script>
<?php
} else{
$insert_sql =" INSERT INTO booking (booking_Date, booking_Time,booking_Statu, member_ID, service_ID)
VALUES ('$date','$booking_Time','$booking_Statu','$member_ID','$service_ID') ";
$RESULT1=mysqli_query($dbConnect,$insert_sql);
 $booking_ID = mysqli_insert_id($dbConnect);
if($RESULT1){
  ?>
  <script type="text/javascript">
  alert("บันทึกข้อมูลเรียบร้อยแล้วค่ะ");
  </script>
  <?php

}else{
  ?>
  <script type="text/javascript">
  alert("ไม่สามารถบันทึกข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ");
  </script>
  <?php

} ?>
<script type="text/javascript">
window.location='../booking/AddSMSBooking.php?service_ID=<?php echo $service_ID; ?>&booking_ID=<?php echo $booking_ID; ?>&member_ID=<?php echo $member_ID; ?>&token=<?php echo md5( $member_ID.'@Confirm'); ?> ';
</script>
<?php
  mysqli_close($dbConnect);
}
?>
