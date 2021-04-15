<?php
include ('connect/connect.php');
$comment_ID=$_GET["comment_ID"];
$ref_clinic_ID=$_GET["clinic_ID"];
 $SQL1="DELETE FROM comment WHERE comment_ID='$comment_ID'";
 $RESULT1=mysqli_query($dbConnect,$SQL1);
 if($RESULT1){?>
<script type="text/javascript">
 alert("ลบความคิดเห็นเรียบร้อยแล้วค่ะ");
</script>
   <?php
 }else{ ?>
   <script type="text/javascript">
     alert("ไม่ลบแสดงความคิดเห็นได้ค่ะ กรุณาโปรดลองใหม่อีกครั้งค่ะ");
   </script>
   <?php
 }
 ?>
<script type="text/javascript">
window.location ='ReadClinic.php?clinic_ID=<?php echo  $ref_clinic_ID ?>&token=<?php echo md5( $ref_clinic_ID.'@Confirm'); ?>#comment';
</script>
<?php
   mysqli_close($dbConnect);

?>
