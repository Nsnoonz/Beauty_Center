<?php
include ('../connect/connect.php');
$article_ID=$_GET["article_ID"];
 $SQL1="DELETE FROM article WHERE article_ID='$article_ID'";
 $RESULT1=mysqli_query($dbConnect,$SQL1);
 if($RESULT1){
	 echo "ลบข้อมูลเรียบร้อยแล้ว....";
 }else{
	 echo "ไม่สามารถลบข้อมูลได้....";
 }
echo '<meta http-equiv="refresh" content="1;url=../All_Article.php">';
mysqli_close($dbConnect);

?>
