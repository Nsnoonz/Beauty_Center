<?php
include ('../connect/connect.php');
$reviews_ID=$_GET["reviews_ID"];
$clinic_ID=$_GET["clinic_ID"];
$clinic_ID;
 $SQL1="DELETE FROM reviews WHERE reviews_ID='$reviews_ID'";
 $RESULT1=mysqli_query($dbConnect,$SQL1);
 if($RESULT1){?>	<script>	alert("ลบข้อมูลเรียบร้อยแล้วค่ะ");	</script>
<?php	}else{?><script>	alert("ไม่สามารถลบข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ");</script>
<?php	} ?>
 <script>
  window.location='AllReviews.php?clinic_ID=<?php echo  $clinic_ID; ?>&token=<?php echo md5( $clinic_ID.'@Confirm'); ?>';
</script>
 <?php
mysqli_close($dbConnect);

?>
