<?php
include ('../connect/connect.php');
$article_ID = $_POST["article_ID"];
$article_NameTitle = $_POST["article_NameTitle"];
$article_Image = (isset($_POST['article_Image']) ? $_POST['v'] : '');
$upload=$_FILES['article_Image']['name'];
$filetype=$_FILES['article_Image']['type'];
if(($filetype!="image/jpg") and ($filetype!="image/jpeg") and ($filetype!="image/pjpeg") and  ($filetype!="image/png") and  ($filetype!="image/gif"))
{?>
	 <script>
	 alert(' image only !');
		window.location='../All_Article.php';
	 </script>";
<?php
}else{
if($upload !='') {
$path="image/";
$type = strrchr($_FILES['article_Image']['name'],".");
$numrand = (mt_rand());
$newname =$article_NameTitle.$numrand.$type;
$path_copy=$path.$newname;
$path_link="fileupload/".$newname;
move_uploaded_file($_FILES['article_Image']['tmp_name'],$path_copy);
}
			 $sql = "UPDATE  article SET article_Image='$newname' WHERE article_ID = '$article_ID' ";
 $RESULT1=mysqli_query($dbConnect,$sql);
 if($RESULT1){    ?>
			 <script>  				alert('บันทึกข้อมูลเรียบร้อยแล้วค่ะ');  				</script>
			 <?php	}else{    ?>
			 <script>  				alert('ไม่สามารถบันทึกข้อมูล กรุณาลองใหม่อีกครั้งค่ะ');  				</script>
			 <?php	} ?>
 <script>
	window.location='../All_Article.php'; </script>
 <?php
	 mysqli_close($dbConnect);
 }
 ?>
