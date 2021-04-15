<?php
include ('../connect/connect.php');
$member_ID = $_REQUEST["member_ID"];
 $member_Name = $_POST["member_Name"];
$member_Image = (isset($_POST['member_Image']) ? $_POST['v'] : '');
$upload=$_FILES['member_Image']['name'];
$filetype=$_FILES['member_Image']['type'];
if(($filetype!="image/jpg") and ($filetype!="image/jpeg") and ($filetype!="image/pjpeg") and  ($filetype!="image/png") and  ($filetype!="image/gif"))
{?>
	<script>
	alert('Only .jpg .png .jpeg Files Are Allowed!');
	window.location='profileMember.php?member_ID=<?php echo  $member_ID; ?>&token=<?php echo md5( $member_ID.'@Confirm'); ?>';
	</script>
	<?php
}else {
	$path="profile/";
	$type = strrchr($_FILES['member_Image']['name'],".");
	$numrand = (mt_rand());
	$newname =$member_Name.$numrand.$type;
	$path_copy=$path.$newname;
	$path_link="fileupload/".$newname;
	move_uploaded_file($_FILES['member_Image']['tmp_name'],$path_copy);
				$sql = "UPDATE  member SET member_Image='$newname' WHERE member_ID = '$member_ID' ";
	$RESULT1=mysqli_query($dbConnect,$sql);
	if($RESULT1){
		echo  "บันทึกข้อมูลเรียบร้อยแล้วค่ะ";
	}else{
		echo "ไม่สามารถบันทึกข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ";
	} ?>
	<script>
window.location='profileMember.php?member_ID=<?php echo  $member_ID; ?>&token=<?php echo md5( $member_ID.'@Confirm'); ?>';
	</script>
	<?php
		mysqli_close($dbConnect);
	}
	?>
