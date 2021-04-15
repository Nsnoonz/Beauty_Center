<?php
include ('../connect/connect.php');
$clinic_ID = $_POST["clinic_ID"];
$doctor_ID = $_POST["doctor_ID"];
$doctor_Name = $_POST["doctor_Name"];
$doctor_ImagePermit = (isset($_POST['doctor_ImagePermit']) ? $_POST['v'] : '');
$upload=$_FILES['doctor_ImagePermit']['name'];
$filetype=$_FILES['doctor_ImagePermit']['type'];
if(($filetype!="image/jpg") and ($filetype!="image/jpeg") and ($filetype!="image/pjpeg") and  ($filetype!="image/png") and  ($filetype!="image/gif"))
{?>
	<script>
	alert('Only .jpg .png .jpeg Files Are Allowed!');

  window.location='AllDoctor.php?clinic_ID=<?php echo  $clinic_ID; ?>&token=<?php echo md5( $clinic_ID.'@Confirm'); ?>';
	</script>
	<?php
}else {
	$path="ImagePermit/";
	$type = strrchr($_FILES['doctor_ImagePermit']['name'],".");
	$numrand = (mt_rand());
	$newname =$doctor_Name.$numrand.$type;
	$path_copy=$path.$newname;
	$path_link="fileupload/".$newname;
	move_uploaded_file($_FILES['doctor_ImagePermit']['tmp_name'],$path_copy);
				$sql = "UPDATE  doctor SET doctor_ImagePermit='$newname' WHERE doctor_ID = '$doctor_ID' ";
	$RESULT1=mysqli_query($dbConnect,$sql);
	if($RESULT1){
		?>
		<script>
		alert("แก้ไขรูปภาพใบอนุญาตประกอบวิชาชีพเรียบร้อยแล้วค่ะ ")
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
window.location='AllDoctor.php?clinic_ID=<?php echo  $clinic_ID; ?>&token=<?php echo md5( $clinic_ID.'@Confirm'); ?>';
	</script>
	<?php
		mysqli_close($dbConnect);
	}
	?>
