<?php
include ('../connect/connect.php');
$reviews_Name = $_POST['reviews_Name'];
$reviews_Description = $_POST['reviews_Description'];
$reviews_Note = $_POST['reviews_Note'];
$reviews_Date = $_POST['reviews_Date'];
$clinic_ID = $_POST['clinic_ID'];
if(isset($_FILES['reviews_Image'])){
$allowed = array('jpg','png','jpeg');
$name_array = $_FILES['reviews_Image']['name'];
$tmp_name_array = $_FILES['reviews_Image']['tmp_name'];
$count_tmp_name_array = count($tmp_name_array);
for($i = 0; $i < $count_tmp_name_array; $i++){
    $extension = pathinfo($name_array[$i] , PATHINFO_EXTENSION);
    if( !in_array( $extension,$allowed) ){
      echo "<script>";
       echo "alert('Only .jpg .png .jpeg Files Are Allowed!');";
       echo "window.location='registerReviews.php';";
             echo "</script>";
    }
    $newname2 = $clinic_ID.$reviews_Name."-".$i.".".$extension;
    if(move_uploaded_file($tmp_name_array[$i], "reviews/".$newname2)){
      $insertQrySplit[] = $newname2;
    }}
 $insertValuesSQL =  implode(",",$insertQrySplit);
 $sql= "INSERT INTO reviews( reviews_Name, reviews_Description, reviews_Image, reviews_Note, reviews_Date, clinic_ID) 
 VALUES ('$reviews_Name','$reviews_Description','$insertValuesSQL', '$reviews_Note','$reviews_Date','$clinic_ID')";

  $RESULT1=mysqli_query($dbConnect,$sql);
  if($RESULT1){ ?>
    <script>	alert("บันทึกข้อมูลเรียบร้อยแล้วค่ะ");	</script>
<?php  }else{ ?>
  <script>	alert("ไม่สามารถบันทึกข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ");</script>
<?php  } ?>
<script>
window.location='AllReviews.php?clinic_ID=<?php echo  $clinic_ID; ?>&token=<?php echo md5( $clinic_ID.'@Confirm');?>';
</script>
  <?php
    mysqli_close($dbConnect);
  }

?>
