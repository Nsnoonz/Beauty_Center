<?php
include ('../connect/connect.php');
$reviews_ID = $_POST['reviews_ID'];
$reviews_Name = $_POST['reviews_Name'];
$reviews_Description = $_POST['reviews_Description'];
$reviews_Note = $_POST['reviews_Note'];
$reviews_Date = $_POST['reviews_Date'];
$clinic_ID = $_POST['clinic_ID'];
//
// if(isset($_FILES['reviews_Image'])){
// $allowed = array('jpg','png','jpeg');
// $name_array = $_FILES['reviews_Image']['name'];
// $tmp_name_array = $_FILES['reviews_Image']['tmp_name'];
// $count_tmp_name_array = count($tmp_name_array);
// for($i = 0; $i < $count_tmp_name_array; $i++){
//     $extension = pathinfo($name_array[$i] , PATHINFO_EXTENSION);
//     if( !in_array( $extension,$allowed) ){
//       echo "<script>";
//        echo "alert('Only .jpg .png .jpeg Files Are Allowed!');";
//        echo "window.location='registerClinic.php';";
//              echo "</script>";
//     }
//     $newname2 = $reviews_Name."-".$i.".".$extension;
//     if(move_uploaded_file($tmp_name_array[$i], "reviews/".$reviews_Name."-".$i.".".$extension)){
//       $insertQrySplit[] = $newname2;
//     }}
//  $insertValuesSQL =  implode(",",$insertQrySplit);
 $sql = "UPDATE  reviews SET reviews_Name='$reviews_Name',reviews_Description='$reviews_Description'
,reviews_Note='$reviews_Note',reviews_Date='$reviews_Date',clinic_ID='$clinic_ID' WHERE reviews_ID = '$reviews_ID' ";
  $RESULT1=mysqli_query($dbConnect,$sql);
  if($RESULT1){?>	<script>	alert("แก้ไขข้อมูลเรียบร้อยแล้วค่ะ");	</script>
<?php	}else{?><script>	alert("ไม่สามารถแก้ไขข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ");</script>
  <?php	} ?>
  <script>
   window.location='AllReviews.php?clinic_ID=<?php echo  $clinic_ID; ?>&token=<?php echo md5( $clinic_ID.'@Confirm'); ?>';
  </script>
  <?php
    mysqli_close($dbConnect);


?>
