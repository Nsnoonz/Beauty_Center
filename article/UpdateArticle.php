<?php
include ('../connect/connect.php');
session_start();
$article_ID = $_POST["article_ID"];
$article_NameTitle = $_POST['article_NameTitle'];
$article_Details = $_POST['article_Details'];
$article_Date = $_POST['article_Date'];
$sql = "UPDATE  article SET article_NameTitle='$article_NameTitle',article_Details='$article_Details' WHERE article_ID = '$article_ID' ";
$RESULT1=mysqli_query($dbConnect,$sql);
if($RESULT1){
	echo  "บันทึกข้อมูลเรียบร้อยแล้วค่ะ";
}else{
	echo "ไม่สามารถบันทึกข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ";
}
echo'<meta http-equiv="refresh" content="2;url=../All_Article.php">';

	mysqli_close($dbConnect);

?>
