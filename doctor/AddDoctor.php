<?php
include ('../connect/connect.php');
$doctor_Name = $_POST['doctor_Name'];
$doctor_Name = $_POST['doctor_Name'];
$doctor_Surname = $_POST['doctor_Surname'];
$doctor_Details = $_POST['doctor_Details'];
$doctor_License = $_POST['doctor_License'];
$clinic_ID = $_POST['clinic_ID'];


$doctor_Image = (isset($_POST['doctor_Image']) ? $_POST['v'] : '');
$upload=$_FILES['doctor_Image']['name'];
$filetype=$_FILES['doctor_Image']['type'];
if(($filetype!="image/jpg") and ($filetype!="image/jpeg") and ($filetype!="image/pjpeg") and  ($filetype!="image/png") and  ($filetype!="image/gif"))
{ ?>
  <script>
  alert('Only .jpg .png .jpeg Files Are Allowed!');
   window.location='registerDoctor.php?clinic_ID=<?php echo  $clinic_ID; ?>&token=<?php echo md5( $clinic_ID.'@Confirm'); ?>';
  </script>
<?php }else{
if($upload !='') {
//โฟลเดอร์ที่เก็บไฟล์
$path="D_profile/";
//ตัวขื่อกับนามสกุลภาพออกจากกัน
$type = strrchr($_FILES['doctor_Image']['name'],".");
//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
$numrand = (mt_rand(0,100));
$newname =$doctor_Name.'-'.$clinic_ID.'-'.$numrand.$type;
$path_copy=$path.$newname;
$path_link="fileupload/".$newname;
//คัดลอกไฟล์ไปยังโฟลเดอร์
move_uploaded_file($_FILES['doctor_Image']['tmp_name'],$path_copy);
}

///////////////////////////////////////////////////
/*photo*/
$doctor_ImagePermit = (isset($_POST['doctor_ImagePermit']) ? $_POST['v'] : '');
$upload2=$_FILES['doctor_ImagePermit']['name'];
$filetype2=$_FILES['doctor_ImagePermit']['type'];
if(($filetype2!="image/jpg") and ($filetype2!="image/jpeg") and ($filetype2!="image/pjpeg") and  ($filetype2!="image/png") and  ($filetype2!="image/gif"))
{
  echo "<script>";
   echo "alert(' jpg,png,gif only !');";
   echo "window.location='registerDoctor.php';";
         echo "</script>";
}else{
if($upload2 !='') {
//โฟลเดอร์ที่เก็บไฟล์
$path2="ImagePermit/";
//ตัวขื่อกับนามสกุลภาพออกจากกัน
$type2 = strrchr($_FILES['doctor_ImagePermit']['name'],".");
//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
$numrand2 = (mt_rand());
$newname2 =$doctor_Surname.$numrand2.$type2;
$path_copy2=$path2.$newname2;
$path_link2="fileupload/".$newname2;
//คัดลอกไฟล์ไปยังโฟลเดอร์
move_uploaded_file($_FILES['doctor_ImagePermit']['tmp_name'],$path_copy2);
}
$chkSql = "SELECT * FROM clinic,doctor WHERE clinic.clinic_ID=doctor.clinic_ID and   doctor_License = $doctor_License";
$check=mysqli_query($dbConnect,$chkSql);
$num=mysqli_num_rows($check);
    if($num > 0)
    { ?>
  <script>
  alert('มีเลขที่ใบประกอบวิชาชีพเวชกรรมนี้แล้วค่ะ \n กรุณาลองใหม่อีกครั้ง');
   window.location='registerDoctor.php?clinic_ID=<?php echo  $clinic_ID; ?>&token=<?php echo md5( $clinic_ID.'@Confirm'); ?>';
  </script>
<?php
}else{

$sql = "insert into doctor(doctor_License,doctor_Name,doctor_Surname,doctor_Details,doctor_Image,doctor_ImagePermit,clinic_ID)
            value('$doctor_License','$doctor_Name','$doctor_Surname','$doctor_Details','$newname','$newname2','$clinic_ID') ";
$RESULT1=mysqli_query($dbConnect,$sql);
if($RESULT1){
  ?><script>   alert('บันทึกข้อมูลเรียบร้อยแล้วค่ะ');   </script>  <?php

}else{
    ?><script>   alert('ไม่สามารถบันทึกข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ');   </script>  <?php

}
?>
  <script>
   window.location='AllDoctor.php?clinic_ID=<?php echo  $clinic_ID; ?>&token=<?php echo md5( $clinic_ID.'@Confirm'); ?>';
  </script>
<?php
	mysqli_close($dbConnect);
}}
}
?>
