<?php
include ('../connect/connect.php');
$article_NameTitle = $_POST['article_NameTitle'];
$article_Details = $_POST['article_Details'];
$article_Date = $_POST['article_Date'];


/*photo*/
$article_Image = (isset($_POST['article_Image']) ? $_POST['v'] : '');
$upload=$_FILES['article_Image']['name'];
$filetype=$_FILES['article_Image']['type'];
if(($filetype!="image/jpg") and ($filetype!="image/jpeg") and ($filetype!="image/pjpeg") and  ($filetype!="image/png") and  ($filetype!="image/gif"))
{ ?>
  <script>
  alert('Only .jpg .png .jpeg Files Are Allowed!');
   window.location='registerArticle.php';
  </script>
  <?php
}else{
if($upload !='') {
//โฟลเดอร์ที่เก็บไฟล์
$path="image/";
//ตัวขื่อกับนามสกุลภาพออกจากกัน
$type = strrchr($_FILES['article_Image']['name'],".");
//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
$numrand = (mt_rand());
$newname =$numrand.$type;
$path_copy=$path.$newname;
$path_link="fileupload/".$newname;
//คัดลอกไฟล์ไปยังโฟลเดอร์
move_uploaded_file($_FILES['article_Image']['tmp_name'],$path_copy);
}



$sql = "insert into article(article_NameTitle,article_Details,article_Date,article_Image)
            value('$article_NameTitle','$article_Details','$article_Date','$newname') ";
$RESULT1=mysqli_query($dbConnect,$sql);
if($RESULT1){
	echo  "บันทึกข้อมูลเรียบร้อยแล้วค่ะ";
}else{
	echo "ไม่สามารถบันทึกข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ";
}
echo'<meta http-equiv="refresh" content="2;url=../All_Article.php">';
	mysqli_close($dbConnect);
}
?>
