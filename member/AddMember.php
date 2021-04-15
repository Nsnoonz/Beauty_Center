<?php
include ('../connect/connect.php');
$member_Name = $_POST['member_Name'];
$member_Surname = $_POST['member_Surname'];
$member_Address = $_POST['member_Address'];
$member_Phone = $_POST['member_Phone'];
$member_Email = $_POST['member_Email'];
$member_Password = md5($_POST['member_Password']);

/*photo*/
$member_Image = (isset($_POST['member_Image']) ? $_POST['v'] : '');
$upload=$_FILES['member_Image']['name'];
$filetype=$_FILES['member_Image']['type'];
if(($filetype!="image/jpg") and ($filetype!="image/jpeg") and ($filetype!="image/pjpeg") and  ($filetype!="image/png") and  ($filetype!="image/gif"))
{
  echo "<script>";
   echo "alert(' jpg,png,gif only !');";
   echo "window.location='../registerMember.php';";
         echo "</script>";
}else{
if($upload !='') {
//โฟลเดอร์ที่เก็บไฟล์
$path="profile/";
//ตัวขื่อกับนามสกุลภาพออกจากกัน
$type = strrchr($_FILES['member_Image']['name'],".");
//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
$numrand = (mt_rand());
$newname =$member_Name.$member_Surname.$numrand.$type;
$path_copy=$path.$newname;
$path_link="fileupload/".$newname;
//คัดลอกไฟล์ไปยังโฟลเดอร์
move_uploaded_file($_FILES['member_Image']['tmp_name'],$path_copy);
}

$check = "select * from member  where member_Email = '$member_Email' ";
	  $result=mysqli_query($dbConnect,$check);
		$num=mysqli_num_rows($result);
        if($num > 0)
        {
//ถ้ามี username นี้อยู่ในระบบแล้วให้แจ้งเตือน
      echo "<script>";
			 echo "alert(' มีผู้ใช้ Email นี้แล้ว กรุณาลองใหม่อีกครั้ง !');";
			 echo "window.location='../registerMember.php';";
          	 echo "</script>";

		}else{

$sql = "insert into member(member_Name,member_Surname,member_Address,member_Phone,member_Image,member_Email,member_Password)
            value('$member_Name','$member_Surname','$member_Address','$member_Phone','$newname','$member_Email','$member_Password') ";
$RESULT1=mysqli_query($dbConnect,$sql);
if($RESULT1){
	echo  "บันทึกข้อมูลเรียบร้อยแล้วค่ะ";
}else{
	echo "ไม่สามารถบันทึกข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ";
}
echo'<meta http-equiv="refresh" content="2;url=../login.php">';
	mysqli_close($dbConnect);
}}
?>
