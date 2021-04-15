<?php
include ('../connect/connect.php');
$clinic_ID = $_REQUEST["clinic_ID"];
$service_ID = $_POST["service_ID"];
$service_Name = $_POST["service_Name"];
if(isset($_FILES['service_Image'])){
	$numrand = (mt_rand(0,1000));
	$allowed = array('jpg','png','jpeg');
	$name_array = $_FILES['service_Image']['name'];
	$tmp_name_array = $_FILES['service_Image']['tmp_name'];
	$count_tmp_name_array = count($tmp_name_array);
 for($i = 0; $i < $count_tmp_name_array; $i++){
			$extension = pathinfo($name_array[$i] , PATHINFO_EXTENSION);
			if( !in_array( $extension,$allowed) ){ ?>
				<script>
				alert('Only .jpg .png .jpeg Files Are Allowed!');
				 window.location='AllService.php?clinic_ID=<?php echo  $clinic_ID; ?>&token=<?php echo md5( $clinic_ID.'@Confirm'); ?>';
				</script>
				<?php
			}else if(in_array( $extension,$allowed)){
			$newname2 = $clinic_ID."-".$service_Name.$numrand."-".$i.".".$extension;
			if(move_uploaded_file($tmp_name_array[$i], "service/".$newname2)){
				$insertQrySplit[] = $newname2;
			}
		}
	}$insertValuesSQL =  implode(",",$insertQrySplit);
      $sql = "UPDATE  service SET service_Image='$insertValuesSQL' WHERE service_ID = '$service_ID' ";
      $RESULT1=mysqli_query($dbConnect,$sql);
      if($RESULT1){        ?>
  				<script>  				alert('บันทึกข้อมูลเรียบร้อยแล้วค่ะ');  				</script>
  				<?php      }else{        ?>
          <script>          alert('ไม่สามารถบันทึกข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ');          </script>
          <?php      }		?>
			<script>  window.location='AllService.php?clinic_ID=<?php echo  $clinic_ID; ?>&token=<?php echo md5( $clinic_ID.'@Confirm'); ?>';		</script>
			<?php			mysqli_close($dbConnect);		}?>
