<?php
include("connect/connect.php");
session_start();
if($_SESSION["loginStatus"]=="Clinic"){
  $user_ID = $_POST["user_ID"];
  $comment_Date = $_POST["comment_Date"];
  $comment_Details = $_POST["comment_Details"];
  $ref_clinic_ID = $_POST["ref_clinic_ID"];
  $user_Status ="Clinic";
  $sql = "insert into comment (ref_clinic_ID,comment_Details,comment_Date,user_ID,user_Status)
              value('$ref_clinic_ID','$comment_Details','$comment_Date','$user_ID','$user_Status') ";
  $RESULT1=mysqli_query($dbConnect,$sql);
  if($RESULT1){?>
<script type="text/javascript">
  alert("แสดงความคิดเห็นเรียบร้อยแล้วค่ะ");
</script>
    <?php
  }else{ ?>
    <script type="text/javascript">
      alert("ไม่สามารถแสดงความคิดเห็นได้ค่ะ กรุณาโปรดลองใหม่อีกครั้งค่ะ");
    </script>
    <?php
  }
  ?>
<script type="text/javascript">
window.location ='ReadClinic.php?clinic_ID=<?php echo  $ref_clinic_ID ?>&token=<?php echo md5( $ref_clinic_ID.'@Confirm'); ?>#comment';

</script>
<?php
  	mysqli_close($dbConnect);
}
else if($_SESSION["loginStatus"]=="Member"){
  $user_ID = $_POST["user_ID"];
  $comment_Date = $_POST["comment_Date"];
  $comment_Details = $_POST["comment_Details"];
  $ref_clinic_ID = $_POST["ref_clinic_ID"];
  $user_Status ="Member";
  $sql = "insert into comment (ref_clinic_ID,comment_Details,comment_Date,user_ID,user_Status)
              value('$ref_clinic_ID','$comment_Details','$comment_Date','$user_ID','$user_Status') ";
  $RESULT1=mysqli_query($dbConnect,$sql);
  if($RESULT1){?>
<script type="text/javascript">
  alert("แสดงความคิดเห็นเรียบร้อยแล้วค่ะ");
</script>
    <?php
  }else{ ?>
    <script type="text/javascript">
      alert("ไม่สามารถแสดงความคิดเห็นได้ค่ะ กรุณาโปรดลองใหม่อีกครั้งค่ะ");
    </script>
    <?php
  }
  ?>
<script type="text/javascript">
window.location ='ReadClinic.php?clinic_ID=<?php echo  $ref_clinic_ID ?>&token=<?php echo md5( $ref_clinic_ID.'@Confirm'); ?>#comment';
</script>
<?php
    mysqli_close($dbConnect);
}
?>
