<?php
include ('../connect/connect.php');
$clinic_ID = $_REQUEST["clinic_ID"];
$clinic_Name = $_POST["clinic_Name"];

if(isset($_FILES['clinic_Image'])){
	$numrand = (mt_rand(0,1000));
	$allowed = array('jpg','png','jpeg');
	$name_array = $_FILES['clinic_Image']['name'];
	$tmp_name_array = $_FILES['clinic_Image']['tmp_name'];
	$count_tmp_name_array = count($tmp_name_array);
 for($i = 0; $i < $count_tmp_name_array; $i++){
			$extension = pathinfo($name_array[$i] , PATHINFO_EXTENSION);
			if( !in_array( $extension,$allowed) ){ ?>
				<script>
				alert('Only .jpg .png .jpeg Files Are Allowed!');
				 window.location='profileClinic.php?clinic_ID=<?php echo  $clinic_ID; ?>&token=<?php echo md5( $clinic_ID.'@Confirm'); ?>';
				</script>
				<?php
			}else if(in_array( $extension,$allowed)){
			$newname2 = $clinic_Name.$numrand."-".$i.".".$extension;
			if(move_uploaded_file($tmp_name_array[$i], "img/".$clinic_Name.$numrand."-".$i.".".$extension)){
				$insertQrySplit[] = $newname2;
			}
		}
	}$insertValuesSQL =  implode(",",$insertQrySplit);
      $sql = "UPDATE  clinic SET clinic_Image='$insertValuesSQL' WHERE clinic_ID = '$clinic_ID' ";
      $RESULT1=mysqli_query($dbConnect,$sql);
      if($RESULT1){        ?>
  				<script>  				alert('บันทึกข้อมูลเรียบร้อยแล้วค่ะ');  				</script>
  				<?php      }else{        ?>
          <script>          alert('ไม่สามารถบันทึกข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ');          </script>
          <?php      }		?>
			<script> window.location='profileClinic.php?clinic_ID=<?php echo  $clinic_ID; ?>&token=<?php echo md5( $clinic_ID.'@Confirm'); ?>';			</script>
			<?php			mysqli_close($dbConnect);		}?>
