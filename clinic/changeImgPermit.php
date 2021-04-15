<?php
include ('../connect/connect.php');
$clinic_ID = $_REQUEST["clinic_ID"];
$clinic_Name = $_POST["clinic_Name"];
$Status = 0;
$clinic_ImagePermit = (isset($_POST['clinic_ImagePermit']) ? $_POST['v'] : '');
$upload=$_FILES['clinic_ImagePermit']['name'];
$filetype=$_FILES['clinic_ImagePermit']['type'];
if(($filetype!="image/jpg") and ($filetype!="image/jpeg") and ($filetype!="image/pjpeg") and  ($filetype!="image/png") and  ($filetype!="image/gif"))
{?>
	<script>
	alert('Only .jpg .png .jpeg Files Are Allowed!');
	window.location='profileClinic.php?clinic_ID=<?php echo  $clinic_ID; ?>&token=<?php echo md5( $clinic_ID.'@Confirm'); ?>';
	</script>
	<?php
}else {
	$path="../clinic/permit/";
	$type = strrchr($_FILES['clinic_ImagePermit']['name'],".");
	$numrand = (mt_rand());
	$newname =$clinic_Name.$numrand.$type;
	$path_copy=$path.$newname;
	$path_link="fileupload/".$newname;
	move_uploaded_file($_FILES['clinic_ImagePermit']['tmp_name'],$path_copy);
				$sql = "UPDATE  clinic SET clinic_ImagePermit='$newname',Status='$Status' WHERE clinic_ID = '$clinic_ID' ";
	$RESULT1=mysqli_query($dbConnect,$sql);
	if($RESULT1){
		?>
		<script>
		alert("แก้ไขรูปภาพใบอนุญาตประกอบการเรียบร้อยแล้วค่ะ \n คุณจะได้รับการพิจารณาใหม่อีกครั้ง")
		</script>
		<?php
	}else{
		?>
		<script>
		alert("ไม่สามารถแก้ไขข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ")
		</script>
		<?php
	} ?>
	<script>
   window.location='profileClinic.php?clinic_ID=<?php echo  $clinic_ID; ?>&token=<?php echo md5( $clinic_ID.'@Confirm'); ?>';
	</script>
	<?php
		mysqli_close($dbConnect);
	}
	?>
