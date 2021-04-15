<?php
include("connect/connect.php");
session_start();
  $comment_ID = $_POST["comment_ID"];
  $comment_Date = $_POST["comment_Date"];
  $comment_Details = $_POST["comment_Details"];
  $ref_clinic_ID = $_POST["ref_clinic_ID"];
  $sql = "UPDATE  comment SET comment_Details='$comment_Details',comment_Date='$comment_Date' WHERE comment_ID = '$comment_ID' ";
  $RESULT1=mysqli_query($dbConnect,$sql);
  if($RESULT1){?>
<script type="text/javascript">
  alert("แก้ไขความคิดเห็นเรียบร้อยแล้วค่ะ");
</script>
    <?php
  }else{ ?>
    <script type="text/javascript">
      alert("ไม่แก้ไขแสดงความคิดเห็นได้ค่ะ กรุณาโปรดลองใหม่อีกครั้งค่ะ");
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
