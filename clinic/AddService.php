<?php
include ('../connect/connect.php');
$service_Name = $_POST['service_Name'];
$service_Description = $_POST['service_Description'];
$service_Price = $_POST['service_Price'];
$serviceType_ID = $_POST['serviceType_ID'];
$clinic_ID = $_POST['clinic_ID'];
if(isset($_FILES['service_Image'])){
$allowed = array('jpg','png','jpeg');
 $numrand = (mt_rand());
$name_array = $_FILES['service_Image']['name'];
$tmp_name_array = $_FILES['service_Image']['tmp_name'];
$count_tmp_name_array = count($tmp_name_array);
for($i = 0; $i < $count_tmp_name_array; $i++){
    $extension = pathinfo($name_array[$i] , PATHINFO_EXTENSION);
    if( !in_array( $extension,$allowed) ){
      echo "<script>";
       echo "alert('Only .jpg .png .jpeg Files Are Allowed!');";
       echo "window.location='registerClinic.php';";
             echo "</script>";
    }
    $newname2 = $clinic_ID.$service_Name.$numrand."-".$i.".".$extension;
    if(move_uploaded_file($tmp_name_array[$i], "service/".$newname2)){
      $insertQrySplit[] = $newname2;
    }}
 $insertValuesSQL =  implode(",",$insertQrySplit);
  $sql = "insert into service(service_Name, service_Description,service_Price, serviceType_ID, clinic_ID, service_Image)
            value('$service_Name','$service_Description','$service_Price','$serviceType_ID','$clinic_ID','$insertValuesSQL') ";
  $RESULT1=mysqli_query($dbConnect,$sql);
  if($RESULT1){?>	<script>	alert("บันทึกข้อมูลเรียบร้อยแล้วค่ะ");	</script>
 <?php	}else{?><script>	alert("ไม่สามารถบันทึกข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ");</script><?php	} ?>
 <script>
window.location='./AllService.php?clinic_ID=<?php echo  $clinic_ID; ?>&token=<?php echo md5( $clinic_ID.'@Confirm'); ?>';
 </script>
 <!-- <?php
  if($RESULT1){
    echo  "บันทึกข้อมูลเรียบร้อยแล้วค่ะ";
  }else{
    echo "ไม่สามารถบันทึกข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ";
  }
  // echo'<meta http-equiv="refresh" content="2;url=login.php">';
    mysqli_close($dbConnect);
  }

?> -->
