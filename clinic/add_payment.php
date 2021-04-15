<?php
include ('../connect/connect.php');
$clinic_ID = $_POST['clinic_ID'];
$clinic_Name = $_POST['clinic_Name'];
$payment_Name = $_POST['payment_Name'];
$payment_Date = $_POST['payment_Date'];
$payment_Time = $_POST['payment_Time'];
$payment_Note = $_POST['payment_Note'];
$payment_Status = 0;
$payment_Receipt = (isset($_POST['payment_Receipt']) ? $_POST['v'] : '');
$upload=$_FILES['payment_Receipt']['name'];
$filetype=$_FILES['payment_Receipt']['type'];
if(($filetype!="image/jpg") and ($filetype!="image/jpeg") and ($filetype!="image/pjpeg") and  ($filetype!="image/png") and  ($filetype!="image/gif"))
{
  echo "<script>";
   echo "alert('Only .jpg .png .jpeg Files Are Allowed!');";
   echo "window.location='payment.php';";
         echo "</script>";
}else if($upload !='') {
  $path="payment/";
  $type = strrchr($_FILES['payment_Receipt']['name'],".");
  $numrand = (mt_rand(0,1000));
  $newname ="clinicID"."-".$clinic_ID."-".$numrand.$type;
  $path_copy=$path.$newname;
  $path_link="fileupload/".$newname;
  move_uploaded_file($_FILES['payment_Receipt']['tmp_name'],$path_copy);
}
$sql = "insert into payment(payment_Name,payment_Date,payment_Time,payment_Receipt,payment_Note,payment_Status,clinic_ID)
            value('$payment_Name','$payment_Date','$payment_Time','$newname','$payment_Note','$payment_Status','$clinic_ID') ";
$RESULT1=mysqli_query($dbConnect,$sql);
if($RESULT1){?>
  <script>	alert("บันทึกข้อมูลเรียบร้อยแล้วค่ะ \n กรุณารอการตรวจสอบจากผู้ดูแลระบบ เวลาทำการ 09:00-19:00น.  ");	</script>
<?php	}else{?>
  <script>	alert("ไม่สามารถบันทึกข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ");</script><?php	} ?>
<script>
window.location='payment.php';
</script>
